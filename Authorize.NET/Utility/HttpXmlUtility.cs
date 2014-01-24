using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Serialization;
using System.Xml;
using System.IO;
using System.Net;
using AuthorizeNet.APICore;

namespace AuthorizeNet {
    /// <summary>
    /// This class posts the XML Form to Authorize.NET
    /// </summary>
    public class HttpXmlUtility {

        string _serviceUrl = TEST_URL;
        string _apiLogin = "";
        string _transactionKey = "";

        /// <summary>
        /// Initializes a new instance of the <see cref="HttpXmlUtility"/> class.
        /// </summary>
        /// <param name="mode">The mode.</param>
        /// <param name="apiLogin">The API login.</param>
        /// <param name="transactionKey">The transaction key.</param>
        public HttpXmlUtility(ServiceMode mode, string apiLogin, string transactionKey) {
            if (mode == ServiceMode.Live)
                _serviceUrl = URL;
            _apiLogin = apiLogin;
            _transactionKey = transactionKey;
        }

        public const string TEST_URL = "https://apitest.authorize.net/xml/v1/request.api";
        public const string URL = "https://api.authorize.net/xml/v1/request.api";

        /// <summary>
        /// Adds authentication information to the request.
        /// </summary>
        /// <param name="request">The request.</param>
        void AuthenticateRequest(ANetApiRequest request) {
            request.merchantAuthentication = new merchantAuthenticationType();
            request.merchantAuthentication.name = _apiLogin;
            request.merchantAuthentication.transactionKey = _transactionKey;
        }

        /// <summary>
        /// Sends the specified API request.
        /// </summary>
        /// <param name="apiRequest">The API request.</param>
        /// <returns></returns>
        public ANetApiResponse Send(ANetApiRequest apiRequest) {

            //Authenticate it
            AuthenticateRequest(apiRequest);

            HttpWebRequest webRequest = (HttpWebRequest)WebRequest.Create(_serviceUrl);
            webRequest.Method = "POST";
            webRequest.ContentType = "text/xml";
            webRequest.KeepAlive = true;

            // Serialize the request
            var type = apiRequest.GetType();
            var serializer = new XmlSerializer(type);
            XmlWriter writer = new XmlTextWriter(webRequest.GetRequestStream(), Encoding.UTF8);
            serializer.Serialize(writer, apiRequest);
            writer.Close();


            // Get the response
            WebResponse webResponse = webRequest.GetResponse();

            // Load the response from the API server into an XmlDocument.
            _xmlDoc = new XmlDocument();
            _xmlDoc.Load(XmlReader.Create(webResponse.GetResponseStream()));


            var response = DecideResponse(_xmlDoc);
            CheckForErrors(response);
            return response;
        }
        XmlDocument _xmlDoc;

        string Serialize(object apiRequest) {
            // Serialize the request
            var result = "";
            using (var stream = new MemoryStream()) {
                var serializer = new XmlSerializer(apiRequest.GetType());
                var writer = new XmlTextWriter(stream, Encoding.UTF8);
                serializer.Serialize(writer, apiRequest);
                writer.Close();
                result = Encoding.UTF8.GetString(stream.GetBuffer());
            }
            return result;
        }
        void CheckForErrors(ANetApiResponse response) {

            if (response.GetType() == typeof(createCustomerProfileTransactionResponse)) {
                //there's a directResponse we need to find...
                var thingy = (createCustomerProfileTransactionResponse)response;
                thingy.directResponse = _xmlDoc.ChildNodes[1].ChildNodes[1].InnerText;
                response = thingy;
            } else {

                if (response.messages.message.Length > 0) {

                    if (response.messages.resultCode == messageTypeEnum.Error) {
                        StringBuilder sb = new StringBuilder();
                        for (int i = 0; i < response.messages.message.Length; i++) {
                            sb.AppendFormat("Error processing request: {0} - {1}", response.messages.message[i].code, response.messages.message[i].text);
                        }
                        throw new InvalidOperationException(sb.ToString());
                    }

                }
            }
        }
        ANetApiResponse DecideResponse(XmlDocument xmldoc) {
            XmlSerializer serializer;

            ANetApiResponse apiResponse = null;

            try {
                var reader = new StringReader(xmldoc.DocumentElement.OuterXml);
                // Use the root node to determine the type of response object to create
                switch (xmldoc.DocumentElement.Name) {
                    case "getSettledBatchListResponse":
                        serializer = new XmlSerializer(typeof(getSettledBatchListResponse));
                        apiResponse = (getSettledBatchListResponse)serializer.Deserialize(reader);
                        break;
                    case "getTransactionDetailsResponse":
                        serializer = new XmlSerializer(typeof(getTransactionDetailsResponse));
                        apiResponse = (getTransactionDetailsResponse)serializer.Deserialize(reader);
                        break;
                    case "getTransactionListResponse":
                        serializer = new XmlSerializer(typeof(getTransactionListResponse));
                        apiResponse = (getTransactionListResponse)serializer.Deserialize(reader);
                        break;

                    case "getUnsettledTransactionListResponse":
                        serializer = new XmlSerializer(typeof(getUnsettledTransactionListResponse));
                        apiResponse = (getUnsettledTransactionListResponse)serializer.Deserialize(reader);
                        break;

                    case "getBatchStatisticsResponse":
                        serializer = new XmlSerializer(typeof(getBatchStatisticsResponse));
                        apiResponse = (getBatchStatisticsResponse)serializer.Deserialize(reader);
                        break;

                    case "createCustomerPaymentProfileResponse":
                        serializer = new XmlSerializer(typeof(createCustomerPaymentProfileResponse));
                        apiResponse = (createCustomerPaymentProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "createCustomerProfileResponse":
                        serializer = new XmlSerializer(typeof(createCustomerProfileResponse));
                        apiResponse = (createCustomerProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "createCustomerProfileTransactionResponse":
                        serializer = new XmlSerializer(typeof(createCustomerProfileTransactionResponse));
                        apiResponse = (createCustomerProfileTransactionResponse)serializer.Deserialize(reader);
                        break;
                    case "createCustomerShippingAddressResponse":
                        serializer = new XmlSerializer(typeof(createCustomerShippingAddressResponse));
                        apiResponse = (createCustomerShippingAddressResponse)serializer.Deserialize(reader);
                        break;
                    case "deleteCustomerPaymentProfileResponse":
                        serializer = new XmlSerializer(typeof(deleteCustomerPaymentProfileResponse));
                        apiResponse = (deleteCustomerPaymentProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "deleteCustomerProfileResponse":
                        serializer = new XmlSerializer(typeof(deleteCustomerProfileResponse));
                        apiResponse = (deleteCustomerProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "deleteCustomerShippingAddressResponse":
                        serializer = new XmlSerializer(typeof(deleteCustomerShippingAddressResponse));
                        apiResponse = (deleteCustomerShippingAddressResponse)serializer.Deserialize(reader);
                        break;
                    case "getCustomerPaymentProfileResponse":
                        serializer = new XmlSerializer(typeof(getCustomerPaymentProfileResponse));
                        apiResponse = (getCustomerPaymentProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "getCustomerProfileIdsResponse":
                        serializer = new XmlSerializer(typeof(getCustomerProfileIdsResponse));
                        apiResponse = (getCustomerProfileIdsResponse)serializer.Deserialize(reader);
                        break;
                    case "getCustomerProfileResponse":
                        serializer = new XmlSerializer(typeof(getCustomerProfileResponse));
                        apiResponse = (getCustomerProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "getCustomerShippingAddressResponse":
                        serializer = new XmlSerializer(typeof(getCustomerShippingAddressResponse));
                        apiResponse = (getCustomerShippingAddressResponse)serializer.Deserialize(reader);
                        break;
                    case "isAliveResponse":
                        serializer = new XmlSerializer(typeof(isAliveResponse));
                        apiResponse = (isAliveResponse)serializer.Deserialize(reader);
                        break;
                    case "updateCustomerPaymentProfileResponse":
                        serializer = new XmlSerializer(typeof(updateCustomerPaymentProfileResponse));
                        apiResponse = (updateCustomerPaymentProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "updateCustomerProfileResponse":
                        serializer = new XmlSerializer(typeof(updateCustomerProfileResponse));
                        apiResponse = (updateCustomerProfileResponse)serializer.Deserialize(reader);
                        break;
                    case "updateCustomerShippingAddressResponse":
                        serializer = new XmlSerializer(typeof(updateCustomerShippingAddressResponse));
                        apiResponse = (updateCustomerShippingAddressResponse)serializer.Deserialize(reader);
                        break;
                    case "validateCustomerPaymentProfileResponse":
                        serializer = new XmlSerializer(typeof(validateCustomerPaymentProfileResponse));
                        apiResponse = (validateCustomerPaymentProfileResponse)serializer.Deserialize(reader);
                        break;
                    //ARB response
                    case "ARBCreateSubscriptionResponse":
                        serializer = new XmlSerializer(typeof(ARBCreateSubscriptionResponse));
                        apiResponse = (ARBCreateSubscriptionResponse)serializer.Deserialize(reader);
                        break;

                    case "ARBUpdateSubscriptionResponse":
                        serializer = new XmlSerializer(typeof(ARBUpdateSubscriptionResponse));
                        apiResponse = (ARBUpdateSubscriptionResponse)serializer.Deserialize(reader);
                        break;

                    case "ARBCancelSubscriptionResponse":
                        serializer = new XmlSerializer(typeof(ARBCancelSubscriptionResponse));
                        apiResponse = (ARBCancelSubscriptionResponse)serializer.Deserialize(reader);
                        break;

                    case "ARBGetSubscriptionStatusResponse":
                        serializer = new XmlSerializer(typeof(ARBGetSubscriptionStatusResponse));
                        apiResponse = (ARBGetSubscriptionStatusResponse)serializer.Deserialize(reader);
                        break;

                    case "ErrorResponse":
                        serializer = new XmlSerializer(typeof(ANetApiResponse));
                        apiResponse = (ANetApiResponse)serializer.Deserialize(reader);
                        break;
                }
            } catch (Exception ex) {
                Console.WriteLine(ex.GetType().ToString() + ": " + ex.Message);
            }

            return apiResponse;

        }

    }
}
