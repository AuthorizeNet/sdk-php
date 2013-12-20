using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Configuration;
using System.Net;
using System.IO;
using System.Diagnostics;
using System.Security.Cryptography.X509Certificates;
using System.Collections.Specialized;
using System.Xml.Serialization;
using System.Xml;

namespace AuthorizeNet {

    public enum ServiceMode {
        Test,
        Live
    }

    public class Gateway : AuthorizeNet.IGateway {

		
		public const string TEST_URL = "https://test.authorize.net/gateway/transact.dll";
        public const string LIVE_URL = "https://secure.authorize.net/gateway/transact.dll";

		
		public string ApiLogin { get; set;}
		public string TransactionKey { get; set;}
		public bool TestMode { get; set;}
		public Gateway (string apiLogin, string transactionKey, bool testMode)
		{
			ApiLogin = apiLogin;
			TransactionKey = transactionKey;
			TestMode = testMode;
		}
		
		public Gateway(string apiLogin, string transactionKey):this(apiLogin,transactionKey,true){}

        public IGatewayResponse Send(IGatewayRequest request) {
            return Send(request, null);
        }

        protected void LoadAuthorization(IGatewayRequest request) {
            request.Queue(ApiFields.ApiLogin, ApiLogin);
            request.Queue(ApiFields.TransactionKey, TransactionKey);
        }

        protected string SendRequest(string serviceUrl, IGatewayRequest request) {
            
            var postData = request.ToPostString();
            var result = "";

            //override the local cert policy - this is for Mono ONLY
            //ServicePointManager.CertificatePolicy = new PolicyOverride();

            var webRequest = (HttpWebRequest)WebRequest.Create(serviceUrl);
            webRequest.Method = "POST";
            webRequest.ContentLength = postData.Length;
            webRequest.ContentType = "application/x-www-form-urlencoded";

            // post data is sent as a stream
            StreamWriter myWriter = null;
            myWriter = new StreamWriter(webRequest.GetRequestStream());
            myWriter.Write(postData);
            myWriter.Close();

            // returned values are returned as a stream, then read into a string
            var response = (HttpWebResponse)webRequest.GetResponse();
            using (StreamReader responseStream = new StreamReader(response.GetResponseStream())) {
                result = responseStream.ReadToEnd();
                responseStream.Close();
            }

            // the response string is broken into an array
            // The split character specified here must match the delimiting character specified above
            return result;
        }

		public virtual IGatewayResponse Send (IGatewayRequest request, string description)
		{

            var serviceUrl = TEST_URL;
            if (!TestMode)
                serviceUrl = LIVE_URL;

            LoadAuthorization(request);
            if(String.IsNullOrEmpty(request.Description))
                request.Queue(ApiFields.Description, description);
#if debug          
            request.DuplicateWindow = "0";
#endif            
            var response = SendRequest(serviceUrl, request);

            return DecideResponse(response.Split('|'));
		}


        /// <summary>
        /// Decides the response.
        /// </summary>
        /// <param name="rawResponse">The raw response.</param>
        /// <returns></returns>
		public IGatewayResponse DecideResponse (string[] rawResponse)
		{
			
			if (rawResponse.Length == 1)
				throw new InvalidDataException ("There was an error returned from AuthorizeNet: " + rawResponse[0] + "; this usually means your data sent along was incorrect. Please recheck that all dates and amounts are formatted correctly");
			
			return new GatewayResponse (rawResponse);
		}
		
		
		class PolicyOverride : ICertificatePolicy
		{

			bool ICertificatePolicy.CheckValidationResult (ServicePoint srvPoint, System.Security.Cryptography.X509Certificates.X509Certificate cert, WebRequest request, int certificateProblem)
			{
				return true;
			}
		}



	}
}
