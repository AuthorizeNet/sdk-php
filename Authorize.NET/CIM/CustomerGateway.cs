using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Xml.Serialization;
using System.Xml;
using System.Net;
using AuthorizeNet.APICore;

namespace AuthorizeNet {
    public class CustomerGateway : ICustomerGateway {

        HttpXmlUtility _gateway;

        /// <summary>
        /// Initializes a new instance of the <see cref="CustomerGateway"/> class.
        /// </summary>
        /// <param name="apiLogin">The API login.</param>
        /// <param name="transactionKey">The transaction key.</param>
        /// <param name="mode">Test or Live.</param>
        public CustomerGateway(string apiLogin, string transactionKey, ServiceMode mode) {
            
            if (mode == ServiceMode.Live) {
                _gateway = new HttpXmlUtility(ServiceMode.Live, apiLogin, transactionKey);
            } else {
                _gateway = new HttpXmlUtility(ServiceMode.Test, apiLogin, transactionKey);

            }
        }
        /// <summary>
        /// Initializes a new instance of the <see cref="CustomerGateway"/> class.
        /// </summary>
        /// <param name="apiLogin">The API login.</param>
        /// <param name="transactionKey">The transaction key.</param>
        public CustomerGateway(string apiLogin, string transactionKey) : this(apiLogin, transactionKey, ServiceMode.Test) { }

        public Customer CreateCustomer(string email, string description) {
            //use the XSD class to create the profile
            var newCustomer = new customerProfileType();
            newCustomer.description = description;
            newCustomer.email = email;

            var req = new createCustomerProfileRequest();
            
            req.profile = newCustomer;

            //serialize and send
            var response = (createCustomerProfileResponse)_gateway.Send(req);

            //set the profile ID
            return new Customer {
                Email = email,
                Description = description,
                ProfileID = response.customerProfileId
            };
        }
        /// <summary>
        /// Retrieve an existing customer profile along with all the associated customer payment profiles and customer shipping addresses. 
        /// </summary>
        /// <param name="profileID">The profile ID</param>
        /// <returns></returns>
        public Customer GetCustomer(string profileID) {
            var response = new getCustomerProfileResponse();
            var req = new getCustomerProfileRequest();
            
            req.customerProfileId = profileID;

            response = (getCustomerProfileResponse)_gateway.Send(req);
            

            var result = new Customer();
            
            result.Email = response.profile.email;
            result.Description = response.profile.description;
            result.ProfileID = response.profile.customerProfileId;
            result.ID = response.profile.merchantCustomerId;

            if (response.profile.shipToList !=null) {
                for (int i = 0; i < response.profile.shipToList.Length; i++) {
                    result.ShippingAddresses.Add(new Address(response.profile.shipToList[i]));
                }
            }

            if (response.profile.paymentProfiles != null) {

                for (int i = 0; i < response.profile.paymentProfiles.Length; i++) {
                    result.PaymentProfiles.Add(new PaymentProfile(response.profile.paymentProfiles[i]));
                }
            }
            return result;
        }

        /// <summary>
        /// Adds a credit card profile to the user and returns the profile ID
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="cardNumber">The card number.</param>
        /// <param name="expirationMonth">The expiration month.</param>
        /// <param name="expirationYear">The expiration year.</param>
        /// <param name="cardCode">The card code.</param>
        /// <returns></returns>
        public string AddCreditCard(string profileID, string cardNumber, int expirationMonth, int expirationYear, string cardCode) {
            return AddCreditCard(profileID, cardNumber, expirationMonth,expirationYear, cardCode, null);
        }

        /// <summary>
        /// Adds a credit card profile to the user and returns the profile ID
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="cardNumber">The card number.</param>
        /// <param name="expirationMonth">The expiration month.</param>
        /// <param name="expirationYear">The expiration year.</param>
        /// <returns></returns>
        public string AddCreditCard(string profileID, string cardNumber, int expirationMonth, int expirationYear)
        {
            return AddCreditCard(profileID, cardNumber, expirationMonth, expirationYear, null, null);
        }

        /// <summary>
        /// Adds a credit card profile to the user and returns the profile ID
        /// </summary>
        /// <returns></returns>
        public string AddCreditCard(string profileID, string cardNumber, int expirationMonth, int expirationYear, string cardCode, Address billToAddress) {

            // Get the expiration date.
            DateTime dt = DateTime.Parse(expirationMonth.ToString() + "-1-" + expirationYear.ToString());
            DateTime expDate = new DateTime(dt.Year, dt.Month, 1).AddMonths(1).AddDays(-1);
            string sExpDate = expDate.ToString("yyyy-MM");
            // Make sure the card has not expired.
            if (expDate <= DateTime.Now)
                throw new Exception("The credit card expiration date \"" + sExpDate + "\" is expired.");

            var req = new createCustomerPaymentProfileRequest();
            

            req.customerProfileId = profileID;
            req.paymentProfile = new customerPaymentProfileType();
            req.paymentProfile.payment = new paymentType();

            var card = new creditCardType();
            if (!String.IsNullOrEmpty(cardCode)) card.cardCode = cardCode;
            card.cardNumber = cardNumber;
            card.expirationDate = sExpDate;
            req.paymentProfile.payment.Item = card;

            if (billToAddress != null)
                req.paymentProfile.billTo = billToAddress.ToAPIType();


            var response = (createCustomerPaymentProfileResponse)_gateway.Send(req);
            
            return response.customerPaymentProfileId;
        }

        /// <summary>
        /// Adds a Shipping Address to the customer profile
        /// </summary>
        public string AddShippingAddress(string profileID, string first, string last, string street, string city, string state, string zip, string country, string phone) {
            return AddShippingAddress(profileID,
                new Address {
                    First = first,
                    Last = last,
                    City = city,
                    State = state,
                    Country = country,
                    Zip = zip,
                    Phone = phone,
                    Street = street
                });
        }
        /// <summary>
        /// Adds a Shipping Address to the customer profile
        /// </summary>
        public string AddShippingAddress(string profileID, Address address) {
            var req = new createCustomerShippingAddressRequest();
            
            req.address = address.ToAPIType();
            req.customerProfileId = profileID;
            var response = (createCustomerShippingAddressResponse)_gateway.Send(req);
            
            return response.customerAddressId;
        }

        /// <summary>
        /// Authorizes and Captures a transaction using the supplied profile information.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="amount">The amount.</param>
        /// <returns></returns>
        public IGatewayResponse AuthorizeAndCapture(string profileID, string paymentProfileID, decimal amount) {
            return AuthorizeAndCapture(profileID, paymentProfileID, amount, 0,0);
        }


        /// <summary>
        /// Authorizes and Captures a transaction using the supplied profile information with Tax and Shipping specified. If you want
        /// to add more detail here, use the 3rd option - which is to add an Order object
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="tax">The tax.</param>
        /// <param name="shipping">The shipping.</param>
        /// <returns></returns>
        public IGatewayResponse AuthorizeAndCapture(string profileID, string paymentProfileID, decimal amount, decimal tax, decimal shipping) {

            var order = new Order(profileID, paymentProfileID,"");
            order.Amount = amount;

            if (tax > 0){
                order.SalesTaxAmount = tax;
                order.SalesTaxName = "Sales Tax";
            }

            if (shipping > 0) {
                order.ShippingAmount = shipping;
                order.ShippingName = "Shipping";
            }

            return AuthorizeAndCapture(order);
        }

        /// <summary>
        /// Authorizes and Captures a transaction using the supplied profile information, abstracted through an Order object. Using the Order
        /// you can add line items, specify shipping and tax, etc.
        /// </summary>
        /// <param name="order">The order.</param>
        /// <returns></returns>
        public IGatewayResponse AuthorizeAndCapture(Order order) {
            var req = new createCustomerProfileTransactionRequest();
            
            var trans = new profileTransAuthCaptureType();

            trans.customerProfileId = order.CustomerProfileID;
            trans.customerPaymentProfileId = order.PaymentProfileID;
            trans.amount = order.Total;

            if (!String.IsNullOrEmpty(order.ShippingAddressProfileID)) {
                trans.customerShippingAddressId = order.ShippingAddressProfileID;
            }

            if (order.SalesTaxAmount > 0)
                trans.tax = new extendedAmountType {
                    amount = order.SalesTaxAmount,
                    description = order.SalesTaxName,
                    name = order.SalesTaxName
                };

            if (order.ShippingAmount > 0)
                trans.shipping = new extendedAmountType {
                    amount = order.ShippingAmount,
                    description = order.ShippingName,
                    name = order.ShippingName
                };

            //line items
            if (order._lineItems.Count > 0) {
                trans.lineItems = order._lineItems.ToArray();
            }

            if (order.TaxExempt.HasValue) {
                trans.taxExempt = order.TaxExempt.Value;
                trans.taxExemptSpecified = true;
            }

            if (order.RecurringBilling.HasValue) {
                trans.recurringBilling = order.RecurringBilling.Value;
                trans.recurringBillingSpecified = true;
            }
            if(!String.IsNullOrEmpty(order.CardCode))
                trans.cardCode = order.CardCode;

            req.transaction = new profileTransactionType();
            req.transaction.Item = trans;

            var response = (createCustomerProfileTransactionResponse)_gateway.Send(req);
            
            
            return new GatewayResponse(response.directResponse.Split(','));


        }

        /// <summary>
        /// Authorizes a transaction using the supplied profile information.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="amount">The amount.</param>
        /// <returns></returns>
        public IGatewayResponse Authorize(string profileID, string paymentProfileID, decimal amount) {
            return Authorize(profileID, paymentProfileID, amount, 0, 0);
        }


        /// <summary>
        /// Authorizes a transaction using the supplied profile information with Tax and Shipping specified. If you want
        /// to add more detail here, use the 3rd option - which is to add an Order object
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="tax">The tax.</param>
        /// <param name="shipping">The shipping.</param>
        /// <returns></returns>
        public IGatewayResponse Authorize(string profileID, string paymentProfileID, decimal amount, decimal tax, decimal shipping) {

            var order = new Order(profileID, paymentProfileID, "");
            order.Amount = amount;

            if (tax > 0) {
                order.SalesTaxAmount = tax;
                order.SalesTaxName = "Sales Tax";
            }

            if (shipping > 0) {
                order.ShippingAmount = shipping;
                order.ShippingName = "Shipping";
            }

            return Authorize(order);
        }

        /// <summary>
        /// Authorizes a transaction using the supplied profile information, abstracted through an Order object. Using the Order
        /// you can add line items, specify shipping and tax, etc.
        /// </summary>
        /// <param name="order">The order.</param>
        /// <returns>A string representing the approval code</returns>
        public IGatewayResponse Authorize(Order order) {
            var req = new createCustomerProfileTransactionRequest();
           
            var trans = new profileTransAuthOnlyType();

            trans.customerProfileId = order.CustomerProfileID;
            trans.customerPaymentProfileId = order.PaymentProfileID;
            trans.amount = order.Total;
           
            //order information
            trans.order = new orderExType();
            trans.order.description = order.Description;
            trans.order.invoiceNumber = order.InvoiceNumber;
            trans.order.purchaseOrderNumber = order.PONumber;

            if (!String.IsNullOrEmpty(order.ShippingAddressProfileID)) {
                trans.customerShippingAddressId = order.ShippingAddressProfileID;
            }

            if (order.SalesTaxAmount > 0)
                trans.tax = new extendedAmountType {
                    amount = order.SalesTaxAmount,
                    description = order.SalesTaxName,
                    name = order.SalesTaxName
                };

            if (order.ShippingAmount > 0)
                trans.shipping = new extendedAmountType {
                    amount = order.ShippingAmount,
                    description = order.ShippingName,
                    name = order.ShippingName
                };

            //line items
            if (order._lineItems.Count > 0) {
                trans.lineItems = order._lineItems.ToArray();
            }

            if (order.TaxExempt.HasValue) {
                trans.taxExempt = order.TaxExempt.Value;
                trans.taxExemptSpecified = true;
            }

            if (order.RecurringBilling.HasValue) {
                trans.recurringBilling = order.RecurringBilling.Value;
                trans.recurringBillingSpecified = true;
            }
            if (!String.IsNullOrEmpty(order.CardCode))
                trans.cardCode = order.CardCode;

            req.transaction = new profileTransactionType();
            req.transaction.Item = trans;
            
            var response = (createCustomerProfileTransactionResponse)_gateway.Send(req);

            return new GatewayResponse(response.directResponse.Split(','));


        }

        /// <summary>
        /// Captures the specified transaction.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileId">The payment profile id.</param>
        /// <param name="cardCode">The 3 or 4 digit card code in the signature space.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="approvalCode">The approval code.</param>
        /// <returns></returns>
        public IGatewayResponse Capture(string profileID, string paymentProfileId, string cardCode, decimal amount, string approvalCode) {
            var req = new createCustomerProfileTransactionRequest();

            var trans = new profileTransCaptureOnlyType();
            trans.approvalCode = approvalCode;
            trans.customerProfileId = profileID;
            trans.amount = amount;
            if (!String.IsNullOrEmpty(cardCode)) trans.cardCode = cardCode;
            trans.customerPaymentProfileId = paymentProfileId;
            
            req.transaction = new profileTransactionType();
            req.transaction.Item = trans;

            var response = (createCustomerProfileTransactionResponse)_gateway.Send(req);
            return new GatewayResponse(response.directResponse.Split(','));
        }

        /// <summary>
        /// Captures the specified transaction.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileId">The payment profile id.</param>
        /// <param name="shippingProfileId">The id of the shipping information to use for the transaction.</param>
        /// <param name="transId">The transaction id to mark to capture (settle).</param>
        /// <param name="amount">The decimal amount to capture.</param>
        /// <returns></returns>
        public IGatewayResponse PriorAuthCapture(string profileID, string paymentProfileId, string shippingProfileId, string transId, Decimal amount)
        {
            var req = new createCustomerProfileTransactionRequest();

            var trans = new profileTransPriorAuthCaptureType();
            if (!String.IsNullOrEmpty(profileID)) trans.customerProfileId = profileID;
            if (!String.IsNullOrEmpty(paymentProfileId)) trans.customerPaymentProfileId = paymentProfileId;
            //else trans.customerPaymentProfileId = null;
            if (!String.IsNullOrEmpty(transId)) trans.transId = transId;
            //else trans.transId = null;
            trans.amount = amount; // required.
            if (!String.IsNullOrEmpty(shippingProfileId)) trans.customerShippingAddressId = shippingProfileId;
            //else trans.customerShippingAddressId = null;
            
            req.transaction = new profileTransactionType();
            req.transaction.Item = trans;

            var response = (createCustomerProfileTransactionResponse)_gateway.Send(req);
            return new GatewayResponse(response.directResponse.Split(','));
        }

        /// <summary>
        /// Captures the specified transaction.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileId">The payment profile id.</param>
        /// <param name="transId">The transaction id to mark to capture (settle).</param>
        /// <param name="amount">The decimal amount to capture.</param>
        /// <returns></returns>
        public IGatewayResponse PriorAuthCapture(string profileID, string paymentProfileId, string transId, Decimal amount)
        {
            return PriorAuthCapture(profileID, paymentProfileId, null, transId, amount);
        }

        /// <summary>
        /// Captures the specified transaction.
        /// </summary>
        /// <param name="transId">The transaction id to mark to capture (settle).</param>
        /// <returns></returns>
        public IGatewayResponse PriorAuthCapture(string transId, Decimal amount)
        {
            return PriorAuthCapture(String.Empty, String.Empty, transId, amount);
        }

        /// <summary>
        /// Refunds a transaction for the specified amount
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileId">The payment profile id.</param>
        /// <param name="transactionId">The transaction id.</param>
        /// <param name="approvalCode">The approval code.</param>
        /// <param name="amount">The amount.</param>
        /// <returns></returns>
        public IGatewayResponse Refund(string profileID, string paymentProfileId, string transactionId, string approvalCode, decimal amount) {
            var req = new createCustomerProfileTransactionRequest();

            var trans = new profileTransRefundType();
            trans.amount = amount;
            trans.customerProfileId = profileID;
            trans.customerPaymentProfileId = paymentProfileId;
            trans.transId = transactionId;

            req.transaction = new profileTransactionType();
            req.transaction.Item = trans;

            var response = (createCustomerProfileTransactionResponse)_gateway.Send(req);
            return new GatewayResponse(response.directResponse.Split(','));
        }
        /// <summary>
        /// Voids a previously authorized transaction
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileId">The payment profile id.</param>
        /// <param name="transactionId">The transaction id.</param>
        /// <param name="approvalCode">The approval code.</param>
        /// <returns></returns>
        public IGatewayResponse Void(string profileID, string paymentProfileId, string transactionId, string approvalCode) {
            var req = new createCustomerProfileTransactionRequest();

            var trans = new profileTransVoidType();
            trans.customerProfileId = profileID;
            trans.customerPaymentProfileId = paymentProfileId;
            trans.transId = transactionId;

            req.transaction = new profileTransactionType();
            req.transaction.Item = trans;

            var response = (createCustomerProfileTransactionResponse)_gateway.Send(req);
            return new GatewayResponse(response.directResponse.Split(','));
        }

        /// <summary>
        /// Deletes a customer from the AuthNET servers.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <returns></returns>
        public bool DeleteCustomer(string profileID) {
            var req = new deleteCustomerProfileRequest();
            req.customerProfileId = profileID;
            
            var response = (deleteCustomerProfileResponse)_gateway.Send(req);
            
            return true;
        }

        /// <summary>
        /// Deletes a payment profile for a customer from the AuthNET servers.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <returns></returns>
        public bool DeletePaymentProfile(string profileID,string paymentProfileID) {
            var req = new deleteCustomerPaymentProfileRequest();
            
            req.customerPaymentProfileId = paymentProfileID;
            req.customerProfileId = profileID;
            var response = (deleteCustomerPaymentProfileResponse)_gateway.Send(req);
            
            return true;
        }

        /// <summary>
        /// Deletes a shipping address for a given user from the AuthNET servers.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="shippingAddressID">The shipping address ID.</param>
        /// <returns></returns>
        public bool DeleteShippingAddress(string profileID, string shippingAddressID) {
            var req = new deleteCustomerShippingAddressRequest();
            
            req.customerAddressId = shippingAddressID;
            req.customerProfileId = profileID;
            var response = (deleteCustomerShippingAddressResponse)_gateway.Send(req);
            
            return true;
        }

        /// <summary>
        /// Returns all Customer IDs stored at Authorize.NET
        /// </summary>
        /// <returns></returns>
        public string[] GetCustomerIDs() {
            var req = new getCustomerProfileIdsRequest();
            
            var response = (getCustomerProfileIdsResponse)_gateway.Send(req);
            
            return response.ids;
        }

        /// <summary>
        /// Gets a shipping address for a customer.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="shippingAddressID">The shipping address ID.</param>
        /// <returns></returns>
        public Address GetShippingAddress(string profileID, string shippingAddressID) {
            var req = new getCustomerShippingAddressRequest();
            
            req.customerAddressId = shippingAddressID;
            req.customerProfileId = profileID;
            var response = (getCustomerShippingAddressResponse)_gateway.Send(req);
            
            return new Address(response.address);
        }

        /// <summary>
        /// Updates a customer's record.
        /// </summary>
        /// <param name="customer">The customer.</param>
        /// <returns></returns>
        public bool UpdateCustomer(Customer customer) {

            var req = new updateCustomerProfileRequest();
            req.profile = new customerProfileExType();
            req.profile.customerProfileId = customer.ProfileID;
            req.profile.description = customer.Description;
            req.profile.email = customer.Email;
            req.profile.merchantCustomerId = customer.ID;

            var response = (updateCustomerProfileResponse)_gateway.Send(req);
            
            return true;


        }

        /// <summary>
        /// Updates a payment profile for a user.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="profile">The profile.</param>
        /// <returns></returns>
        public bool UpdatePaymentProfile(string profileID, PaymentProfile profile) {

            var req = new updateCustomerPaymentProfileRequest();
            
            req.customerProfileId = profileID;
            req.paymentProfile = profile.ToAPI();

            var response = (updateCustomerPaymentProfileResponse)_gateway.Send(req);
            
            return true;
        }


        /// <summary>
        /// Updates a shipping address for a user.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="address">The address.</param>
        /// <returns></returns>
        public bool UpdateShippingAddress(string profileID, Address address) {
            var req = new updateCustomerShippingAddressRequest();
            
            req.customerProfileId = profileID;
            req.address = address.ToAPIExType();
            var response = (updateCustomerShippingAddressResponse)_gateway.Send(req);
            
            return true;
        }

        /// <summary>
        /// Overload method ommitting shippingAddressID.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="mode">The mode.</param>
        /// <returns></returns>
        public string ValidateProfile(string profileID, string paymentProfileID, ValidationMode mode) {
            return ValidateProfile(profileID, paymentProfileID, null, mode);
        }

        /// <summary>
        /// Overload method ommitting shippingAddressID & ValidationMode enum so will use the value passed into the constructor.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <returns></returns>
        public string ValidateProfile(string profileID, string paymentProfileID)
        {
            return ValidateProfile(profileID, paymentProfileID, null, ValidationMode.None);
        }

        /// <summary>
        /// Overload method ommitting ValidationMode enum so will use the value passed into the constructor.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="shippingAddressID">The shipping address ID.</param>
        /// <returns></returns>
        public string ValidateProfile(string profileID, string paymentProfileID, string shippingAddressID)
        {
            return ValidateProfile(profileID, paymentProfileID, shippingAddressID, ValidationMode.None);
        }

        /// <summary>
        /// This function validates the information on a profile - making sure what you have stored at AuthNET is valid. You can
        /// do this in two ways: in TestMode it will just run a validation to be sure all required fields are present and valid. If 
        /// you specify "live" - a live authorization request will be performed.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileID">The payment profile ID.</param>
        /// <param name="shippingAddressID">The shipping address ID.</param>
        /// <param name="mode">The mode.</param>
        /// <returns></returns>
        public string ValidateProfile(string profileID, string paymentProfileID, string shippingAddressID, ValidationMode mode) {
            var req = new validateCustomerPaymentProfileRequest();
            

            req.customerProfileId = profileID;
            req.customerPaymentProfileId = paymentProfileID;
            if (!String.IsNullOrEmpty(shippingAddressID)) {
                req.customerShippingAddressId = shippingAddressID;
            }
            req.validationMode = Customer.ToValidationMode(mode);

            var response = (validateCustomerPaymentProfileResponse)_gateway.Send(req);
            return response.directResponse;

        }
    }
}
