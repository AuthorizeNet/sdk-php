using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Web;
using System.IO;
using System.Net;
using System.Text.RegularExpressions;
using System.Collections.Specialized;

namespace AuthorizeNet {

    /// <summary>
    /// The type of API Request being performed
    /// </summary>
    public enum RequestAction {
        /// <summary>
        /// Credit Card authorization
        /// </summary>
        Authorize,
        /// <summary>
        /// Settlement of a previously authorized transaction
        /// </summary>
        Capture,
        /// <summary>
        /// An authorization and capture all in one
        /// </summary>
        AuthorizeAndCapture,
        /// <summary>
        /// A Credit
        /// </summary>
        Credit,
        /// <summary>
        /// Voiding of a previously authorized transaction
        /// </summary>
        Void,
        /// <summary>
        /// Capturing of a prior authorization
        /// </summary>
        PriorAuthCapture,
        /// <summary>
        /// Issue a credit for a transaction not based with the API
        /// </summary>
        UnlinkedCredit
    }

    /// <summary>
    /// The type of BankAccount to be used
    /// </summary>
    public enum BankAccountType {
        /// <summary>
        /// Checking Account
        /// </summary>
        Checking,
        /// <summary>
        /// Business Checking account
        /// </summary>
        BusinessChecking,
        /// <summary>
        /// Savings Account
        /// </summary>
        Savings
    }

    /// <summary>
    /// The type of eCheck transaction
    /// </summary>
    public enum EcheckType {
        /// <summary>
        /// Accounts Receivable Conversion
        /// </summary>
        ARC,
        /// <summary>
        /// Back Office Conversion
        /// </summary>
        BOC,
        /// <summary>
        /// Cash Concentration or Disbursement
        /// </summary>
        CCD,
        /// <summary>
        /// Prearranged Payment and Deposit Entry
        /// </summary>
        PPD,
        /// <summary>
        /// Telephone-Initiated Entry
        /// </summary>
        TEL,
        /// <summary>
        /// Internet-Initiated Entry
        /// </summary>
        WEB
    }
    /// <summary>
    /// An abstract base class, from which all Request classes must inherit
    /// </summary>
    public abstract class GatewayRequest : IGatewayRequest {
        //public Dictionary<string,string> Post { get; set; }
        public NameValueCollection Post { get; set; }
        StringBuilder _post;
        RequestAction _apiAction;
        public RequestAction ApiAction {
            get {
                return _apiAction;
            }
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="GatewayRequest"/> class.
        /// </summary>
        public GatewayRequest ()
		{
            Post = new NameValueCollection();
            _post = new StringBuilder();
            LoadCoreValues();
            _apiAction = RequestAction.AuthorizeAndCapture;
        }

        internal void SetApiAction(RequestAction action) {
            _apiAction = action;
            var apiValue = "AUTH_CAPTURE";

            switch (action) {
                case RequestAction.Authorize:
                    apiValue = "AUTH_ONLY";
                    break;
                case RequestAction.Capture:
                    apiValue = "CAPTURE_ONLY";
                    break;
                case RequestAction.UnlinkedCredit:
                case RequestAction.Credit:
                    apiValue = "CREDIT";
                    break;
                case RequestAction.Void:
                    apiValue = "VOID";
                    break;
                case RequestAction.PriorAuthCapture:
                    apiValue = "PRIOR_AUTH_CAPTURE";
                    break;
            }
            Queue(ApiFields.TransactionType, apiValue);
        }



        /// <summary>
        /// Outputs the queue as a delimited, URL-safe string for sending to Authorize.net as a form POST
        /// </summary>
        public string ToPostString() {
            List<String> items = new List<String>();

            // clear the post string.
            // note:  the StringBuilder.Clear() method is not available
            // is this version of the framework.
            _post.Remove(0, _post.Length);

            bool bFirst = true;
            for (int i = 0; i < Post.Count; i++)
            {
                string key = Post.GetKey(i);
                string[] values = Post.GetValues(i);

                // Make sure that we have valid values to process
                if (null == values || 0 == values.Length)
                {
                    values = new string[] { "" };
                }

                for (int j = 0; j < values.Length; j++)
                {
                    if (bFirst)
                    {
                        bFirst = false;
                    }
                    else
                    {
                        _post.Append("&");
                    }

                    // Make sure that the value is encoded before appending
                    _post.Append(key);
                    _post.Append("=");
                    _post.Append(HttpUtility.UrlEncode(values[j]));
                }
            }

            return _post.ToString();
        }

        /// <summary>
        /// Queues the specified key into the request.
        /// </summary>
        /// <param name="key">The key.</param>
        /// <param name="value">The value.</param>
		public void Queue (string key, string value)
		{
            //allow for pushing of new bits...
            if (!String.IsNullOrEmpty(Post.Get(key)))
                Post.Remove(key);

            Post.Add(key, value);
		}

        /// <summary>
        /// Gets the specified key from the request.
        /// </summary>
        /// <param name="key">The key.</param>
        public string Get(string key) {

            //allow for pushing of new bits...
            if (!String.IsNullOrEmpty(Post.Get(key)))
                return Post[key];

            return null;
        }

        /// <summary>
        /// Loads the core values tp the API request, including auth and basic settings.
        /// </summary>
        void LoadCoreValues() {
            this.Queue(ApiFields.DelimitData, "TRUE");
            this.Queue(ApiFields.DelimitCharacter, "|");
            this.Queue(ApiFields.RelayResponse, "FALSE");
            this.Queue(ApiFields.Method, "CC");
            this.Queue(ApiFields.Version, "3.1");
        }
        /// <summary>
        /// Adds a Customer record to the current request
        /// </summary>
        public IGatewayRequest AddCustomer(string ID, string first, string last, string address, string state, string zip) {
            Queue(ApiFields.FirstName, first);
            Queue(ApiFields.LastName, last);
            Queue(ApiFields.Address, address);
            Queue(ApiFields.State, state);
            Queue(ApiFields.Zip, zip);
            Queue(ApiFields.CustomerID, ID);

            return this;
        }

        /// <summary>
        /// This method adds the required values for Fraud Detection Suite. Your merchant must sign up for this service with Authorize.Net
        /// </summary>
        /// <param name="customerIP">The Customer's IP address</param>
        /// <returns></returns>
        public IGatewayRequest AddFraudCheck(string customerIP) {
            this.CustomerIp = customerIP;
            return this;
        }

        /// <summary>
        /// This method will pull the user's IP address for use with FDS. Only valid for Web-based transactions.
        /// </summary>
        /// <returns></returns>
        public IGatewayRequest AddFraudCheck() {
            if(HttpContext.Current != null)
                this.CustomerIp = HttpContext.Current.Request.UserHostAddress;
            return this;
        }


        /// <summary>
        /// Adds a detailed tax value to the request
        /// </summary>
        public IGatewayRequest AddFreight(decimal amount, string name, string description) {
            this.Freight = string.Format("{0}<|>{1}<|>{2}", name, description, amount.ToString());
            return this;
        }
        /// <summary>
        /// Adds a tax value to the request
        /// </summary>
        public IGatewayRequest AddFreight(decimal amount) {
            this.Freight = amount.ToString();
            return this;
        }



        /// <summary>
        /// Adds a detailed tax value to the request
        /// </summary>
        public IGatewayRequest AddDuty(decimal amount, string name, string description) {
            this.Duty = string.Format("{0}<|>{1}<|>{2}", name, description, amount.ToString());
            return this;
        }
        /// <summary>
        /// Adds a tax value to the request
        /// </summary>
        public IGatewayRequest AddDuty(decimal amount) {
            this.Duty = amount.ToString();
            return this;
        }

        /// <summary>
        /// Adds a detailed tax value to the request
        /// </summary>
        public IGatewayRequest AddTax(decimal amount, string name, string description) {
            this.Tax = string.Format("{0}<|>{1}<|>{2}", name, description, amount.ToString());
            return this;
        }
        /// <summary>
        /// Adds a tax value to the request
        /// </summary>
        public IGatewayRequest AddTax(decimal amount) {
            this.Tax = amount.ToString();
            return this;
        }
        /// <summary>
        /// The 3-digit Credit Card Code (CCV) on the back of the card
        /// </summary>
         public IGatewayRequest AddCardCode(string cardCode) {
            Queue(ApiFields.CreditCardCode, cardCode);
            return this;
        }

        /// <summary>
        /// Adds a Shipping Record to the current request
        /// </summary>
        public IGatewayRequest AddShipping(string ID, string first, string last, string address, string state, string zip) {
            Queue(ApiFields.ShipFirstName, first);
            Queue(ApiFields.ShipLastName, last);
            Queue(ApiFields.ShipAddress, address);
            Queue(ApiFields.ShipState, state);
            Queue(ApiFields.ShipZip, zip);
            return this;

        }

        /// <summary>
        /// This is where you can add custom values to the request, which will be returned to you
        /// in the response
        /// </summary>
        public IGatewayRequest AddMerchantValue(string key, string value) {
            Queue(key, value);
            return this;
        }

        /// <summary>
        /// Adds a line item to the current order
        /// </summary>
        /// <returns></returns>
        public IGatewayRequest AddLineItem(string itemID, string name, string description, int quantity, decimal price, bool taxable) {

            String sFld = ApiFields.LineItem;
            var lineFormat = string.Format("{0}<|>{1}<|>{2}<|>{3}<|>{4}<|>{5}",
                itemID,
                name,
                description,
                quantity.ToString(), price.ToString(), taxable.ToString());
            Post.Add(sFld, lineFormat);
            return this;
        }

        /// <summary>
        /// Adds an InvoiceNumber to the request
        /// </summary>
        public IGatewayRequest AddInvoice(string invoiceNumber) {
            Queue(ApiFields.InvoiceNumber, invoiceNumber);
            return this;
        }

        #region All API Props



        /// <summary>
        /// Gets or sets the bank ABA code.
        /// </summary>
        /// <value>The bank ABA code.</value>
        public string BankABACode {
            get { return Get(ApiFields.BankABACode); }
            set { Queue(ApiFields.BankABACode, value); }
        }
        /// <summary>
        /// Gets or sets the bank account number.
        /// </summary>
        /// <value>The bank account number.</value>
        public string BankAccountNumber {
            get { return Get(ApiFields.BankAcctNum); }
            set { Queue(ApiFields.BankAcctNum, value); }
        }
        /// <summary>
        /// Gets or sets the type of the bank account.
        /// </summary>
        /// <value>The type of the bank account.</value>
        public BankAccountType BankAccountType {
            get { return (BankAccountType)Enum.Parse(typeof(BankAccountType), Get(ApiFields.BankAcctType), true); }
            set { Queue(ApiFields.BankAcctType, value.ToString()); }
        }
        /// <summary>
        /// Gets or sets the name of the bank.
        /// </summary>
        /// <value>The name of the bank.</value>
        public string BankName {
            get { return Get(ApiFields.BankName); }
            set { Queue(ApiFields.BankName, value); }
        }
        /// <summary>
        /// Gets or sets the name of the bank account.
        /// </summary>
        /// <value>The name of the bank account.</value>
        public string BankAccountName {
            get { return Get(ApiFields.BankAcctName); }
            set { Queue(ApiFields.BankAcctName, value); }
        }
        /// <summary>
        /// Gets or sets the type of the echeck.
        /// </summary>
        /// <value>The type of the echeck.</value>
        public EcheckType EcheckType {
            get { return (EcheckType)Enum.Parse(typeof(EcheckType),Get(ApiFields.EcheckType), true); }
            set { Queue(ApiFields.EcheckType, value.ToString()); }
        }
        /// <summary>
        /// Gets or sets the bank check number.
        /// </summary>
        /// <value>The bank check number.</value>
        public string BankCheckNumber {
            get { return Get(ApiFields.BankCheckNumber); }
            set { Queue(ApiFields.BankCheckNumber, value); }
        }

        /// <summary>
        /// Gets or sets the address.
        /// </summary>
        /// <value>The address.</value>
        public string Address {
            get { return Get(ApiFields.Address); }
            set { Queue(ApiFields.Address, value); }
        }
        /// <summary>
        /// Gets or sets the allow partial auth.
        /// </summary>
        /// <value>The allow partial auth.</value>
        public string AllowPartialAuth {
            get { return Get(ApiFields.AllowPartialAuth); }
            set { Queue(ApiFields.AllowPartialAuth, value); }
        }
        /// <summary>
        /// Gets or sets the amount.
        /// </summary>
        /// <value>The amount.</value>
        public string Amount {
            get { return Get(ApiFields.Amount); }
            set { Queue(ApiFields.Amount, value); }
        }
        /// <summary>
        /// Gets or sets the auth code.
        /// </summary>
        /// <value>The auth code.</value>
        public string AuthCode {
            get { return Get(ApiFields.AuthorizationCode); }
            set { Queue(ApiFields.AuthorizationCode, value); }
        }
        /// <summary>
        /// Gets or sets the authentication indicator.
        /// </summary>
        /// <value>The authentication indicator.</value>
        public string AuthenticationIndicator {
            get { return Get(ApiFields.AuthenticationIndicator); }
            set { Queue(ApiFields.AuthenticationIndicator, value); }
        }
        /// <summary>
        /// Gets or sets the credit card code.
        /// </summary>
        /// <value>The card code.</value>
        public string CardCode {
            get { return Get(ApiFields.CreditCardCode); }
            set { Queue(ApiFields.CreditCardCode, value); }
        }
        /// <summary>
        /// Gets or sets the credit card number.
        /// </summary>
        /// <value>The card num.</value>
        public string CardNum {
            get { return Get(ApiFields.CreditCardNumber); }
            set { Queue(ApiFields.CreditCardNumber, value); }
        }
        /// <summary>
        /// Gets or sets the cardholder authentication value.
        /// </summary>
        /// <value>The cardholder authentication value.</value>
        public string CardholderAuthenticationValue {
            get { return Get(ApiFields.CardholderAuthenticationValue); }
            set { Queue(ApiFields.CardholderAuthenticationValue, value); }
        }
        /// <summary>
        /// Gets or sets the city.
        /// </summary>
        /// <value>The city.</value>
        public string City {
            get { return Get(ApiFields.City); }
            set { Queue(ApiFields.City, value); }
        }
        /// <summary>
        /// Gets or sets the company.
        /// </summary>
        /// <value>The company.</value>
        public string Company {
            get { return Get(ApiFields.Company); }
            set { Queue(ApiFields.Company, value); }
        }
        /// <summary>
        /// Gets or sets the country.
        /// </summary>
        /// <value>The country.</value>
        public string Country {
            get { return Get(ApiFields.Country); }
            set { Queue(ApiFields.Country, value); }
        }
        /// <summary>
        /// Gets or sets the cust id.
        /// </summary>
        /// <value>The cust id.</value>
        public string CustId {
            get { return Get(ApiFields.CustomerID); }
            set { Queue(ApiFields.CustomerID, value); }
        }
        /// <summary>
        /// Gets or sets the customer ip.
        /// </summary>
        /// <value>The customer ip.</value>
        public string CustomerIp {
            get { return Get(ApiFields.CustomerIPAddress); }
            set { Queue(ApiFields.CustomerIPAddress, value); }
        }
        /// <summary>
        /// Gets or sets the delim char.
        /// </summary>
        /// <value>The delim char.</value>
        public string DelimChar {
            get { return Get(ApiFields.DelimitCharacter); }
            set { Queue(ApiFields.DelimitCharacter, value); }
        }
        /// <summary>
        /// Gets or sets the delim data.
        /// </summary>
        /// <value>The delim data.</value>
        public string DelimData {
            get { return Get(ApiFields.DelimitData); }
            set { Queue(ApiFields.DelimitData, value); }
        }
        /// <summary>
        /// Gets or sets the description.
        /// </summary>
        /// <value>The description.</value>
        public string Description {
            get { return Get(ApiFields.Description); }
            set { Queue(ApiFields.Description, value); }
        }
        /// <summary>
        /// Gets or sets the duplicate window - the am.
        /// </summary>
        /// <value>The duplicate window.</value>
        public string DuplicateWindow {
            get { return Get(ApiFields.DuplicateWindowTime); }
            set { Queue(ApiFields.DuplicateWindowTime, value); }
        }
        /// <summary>
        /// Gets or sets the duty.
        /// </summary>
        /// <value>The duty.</value>
        public string Duty {
            get { return Get(ApiFields.Duty); }
            set { Queue(ApiFields.Duty, value); }
        }
        /// <summary>
        /// Gets or sets the email.
        /// </summary>
        /// <value>The email.</value>
        public string Email {
            get { return Get(ApiFields.Email); }
            set { Queue(ApiFields.Email, value); }
        }
        /// <summary>
        /// Gets or sets the value indicating that the customer get an email receipt.  This should be true or false, yes or no.
        /// </summary>
        /// <value>The email customer.</value>
        public string EmailCustomer {
            get { return Get(ApiFields.EmailCustomer); }
            set { Queue(ApiFields.EmailCustomer, value); }
        }
        /// <summary>
        /// Gets or sets the merchant email.
        /// </summary>
        /// <value>The email address to which to send the merchant email receipt.</value>
        public string MerchantEmail
        {
            get { return Get(ApiFields.MerchantEmail); }
            set { Queue(ApiFields.MerchantEmail, value); }
        }
        /// <summary>
        /// Gets or sets the encap char.
        /// </summary>
        /// <value>The encap char.</value>
        public string EncapChar {
            get { return Get(ApiFields.EncapChar); }
            set { Queue(ApiFields.EncapChar, value); }
        }
        /// <summary>
        /// Gets or sets the exp date.
        /// </summary>
        /// <value>The exp date.</value>
        public string ExpDate {
            get { return Get(ApiFields.CreditCardExpiration); }
            set { Queue(ApiFields.CreditCardExpiration, value); }
        }
        /// <summary>
        /// Gets or sets the fax.
        /// </summary>
        /// <value>The fax.</value>
        public string Fax {
            get { return Get(ApiFields.Fax); }
            set { Queue(ApiFields.Fax, value); }
        }
        /// <summary>
        /// Gets or sets the first name.
        /// </summary>
        /// <value>The first name.</value>
        public string FirstName {
            get { return Get(ApiFields.FirstName); }
            set { Queue(ApiFields.FirstName, value); }
        }
        /// <summary>
        /// Gets or sets the footer email receipt.
        /// </summary>
        /// <value>The footer email receipt.</value>
        public string FooterEmailReceipt {
            get { return Get(ApiFields.FooterEmailReceipt); }
            set { Queue(ApiFields.FooterEmailReceipt, value); }
        }
        /// <summary>
        /// Gets or sets the freight.
        /// </summary>
        /// <value>The freight.</value>
        public string Freight {
            get { return Get(ApiFields.Freight); }
            set { Queue(ApiFields.Freight, value); }
        }
        /// <summary>
        /// Gets or sets the header email receipt.
        /// </summary>
        /// <value>The header email receipt.</value>
        public string HeaderEmailReceipt {
            get { return Get(ApiFields.HeaderEmailReceipt); }
            set { Queue(ApiFields.HeaderEmailReceipt, value); }
        }
        /// <summary>
        /// Gets or sets the invoice num.
        /// </summary>
        /// <value>The invoice num.</value>
        public string InvoiceNum {
            get { return Get(ApiFields.InvoiceNumber); }
            set { Queue(ApiFields.InvoiceNumber, value); }
        }
        /// <summary>
        /// Gets or sets the last name.
        /// </summary>
        /// <value>The last name.</value>
        public string LastName {
            get { return Get(ApiFields.LastName); }
            set { Queue(ApiFields.LastName, value); }
        }
        /// <summary>
        /// Gets or sets the line item.
        /// </summary>
        /// <value>The line item.</value>
        public string LineItem {
            get { return Get(ApiFields.LineItem); }
            set { Queue(ApiFields.LineItem, value); }
        }
        /// <summary>
        /// Gets or sets the login.
        /// </summary>
        /// <value>The login.</value>
        public string Login {
            get { return Get(ApiFields.ApiLogin); }
            set { Queue(ApiFields.ApiLogin, value); }
        }
        /// <summary>
        /// Gets or sets the method.
        /// </summary>
        /// <value>The method.</value>
        public string Method {
            get { return Get(ApiFields.Method); }
            set { Queue(ApiFields.Method, value); }
        }
        /// <summary>
        /// Gets or sets the phone.
        /// </summary>
        /// <value>The phone.</value>
        public string Phone {
            get { return Get(ApiFields.Phone); }
            set { Queue(ApiFields.Phone, value); }
        }
        /// <summary>
        /// Gets or sets the po number.
        /// </summary>
        /// <value>The po num.</value>
        public string PoNum {
            get { return Get(ApiFields.PONumber); }
            set { Queue(ApiFields.PONumber, value); }
        }
        /// <summary>
        /// Gets or sets the recurring billing.
        /// </summary>
        /// <value>The recurring billing.</value>
        public string RecurringBilling {
            get { return Get(ApiFields.RecurringBilling); }
            set { Queue(ApiFields.RecurringBilling, value); }
        }
        /// <summary>
        /// Gets or sets the relay response.
        /// </summary>
        /// <value>The relay response.</value>
        public string RelayResponse {
            get { return Get(ApiFields.RelayResponse); }
            set { Queue(ApiFields.RelayResponse, value); }
        }
        /// <summary>
        /// Gets or sets the ship to address.
        /// </summary>
        /// <value>The ship to address.</value>
        public string ShipToAddress {
            get { return Get(ApiFields.ShipToAddress); }
            set { Queue(ApiFields.ShipToAddress, value); }
        }
        /// <summary>
        /// Gets or sets the ship to company.
        /// </summary>
        /// <value>The ship to company.</value>
        public string ShipToCompany {
            get { return Get(ApiFields.ShipToCompany); }
            set { Queue(ApiFields.ShipToCompany, value); }
        }
        /// <summary>
        /// Gets or sets the ship to country.
        /// </summary>
        /// <value>The ship to country.</value>
        public string ShipToCountry {
            get { return Get(ApiFields.ShipToCountry); }
            set { Queue(ApiFields.ShipToCountry, value); }
        }
        /// <summary>
        /// Gets or sets the ship to city.
        /// </summary>
        /// <value>The ship to city.</value>
        public string ShipToCity {
            get { return Get(ApiFields.ShipToCity); }
            set { Queue(ApiFields.ShipToCity, value); }
        }
        /// <summary>
        /// Gets or sets the first name of the ship to.
        /// </summary>
        /// <value>The first name of the ship to.</value>
        public string ShipToFirstName {
            get { return Get(ApiFields.ShipToFirstName); }
            set { Queue(ApiFields.ShipToFirstName, value); }
        }
        /// <summary>
        /// Gets or sets the last name of the ship to.
        /// </summary>
        /// <value>The last name of the ship to.</value>
        public string ShipToLastName {
            get { return Get(ApiFields.ShipToLastName); }
            set { Queue(ApiFields.ShipToLastName, value); }
        }
        /// <summary>
        /// Gets or sets the state of the ship to.
        /// </summary>
        /// <value>The state of the ship to.</value>
        public string ShipToState {
            get { return Get(ApiFields.ShipToState); }
            set { Queue(ApiFields.ShipToState, value); }
        }
        /// <summary>
        /// Gets or sets the ship to zip.
        /// </summary>
        /// <value>The ship to zip.</value>
        public string ShipToZip {
            get { return Get(ApiFields.ShipToZip); }
            set { Queue(ApiFields.ShipToZip, value); }
        }
        /// <summary>
        /// Gets or sets the split tender id.
        /// </summary>
        /// <value>The split tender id.</value>
        public string SplitTenderId {
            get { return Get(ApiFields.SplitTenderId); }
            set { Queue(ApiFields.SplitTenderId, value); }
        }
        /// <summary>
        /// Gets or sets the state.
        /// </summary>
        /// <value>The state.</value>
        public string State {
            get { return Get(ApiFields.State); }
            set { Queue(ApiFields.State, value); }
        }
        /// <summary>
        /// Gets or sets the tax.
        /// </summary>
        /// <value>The tax.</value>
        public string Tax {
            get { return Get(ApiFields.Tax); }
            set { Queue(ApiFields.Tax, value); }
        }
        /// <summary>
        /// Gets or sets the tax exempt.
        /// </summary>
        /// <value>The tax exempt.</value>
        public string TaxExempt {
            get { return Get(ApiFields.TaxExempt); }
            set { Queue(ApiFields.TaxExempt, value); }
        }
        /// <summary>
        /// Gets or sets the test request.
        /// </summary>
        /// <value>The test request.</value>
        public string TestRequest {
            get { return Get(ApiFields.TestRequest); }
            set { Queue(ApiFields.TestRequest, value); }
        }
        /// <summary>
        /// Gets or sets the tran key.
        /// </summary>
        /// <value>The tran key.</value>
        public string TranKey {
            get { return Get(ApiFields.TransactionKey); }
            set { Queue(ApiFields.TransactionKey, value); }
        }
        /// <summary>
        /// Gets or sets the trans id.
        /// </summary>
        /// <value>The trans id.</value>
        public string TransId {
            get { return Get(ApiFields.TransactionID); }
            set { Queue(ApiFields.TransactionID, value); }
        }
        /// <summary>
        /// Gets or sets the type.
        /// </summary>
        /// <value>The type.</value>
        public string Type {
            get { return Get(ApiFields.Type); }
            set { Queue(ApiFields.Type, value); }
        }
        /// <summary>
        /// Gets or sets the version.
        /// </summary>
        /// <value>The version.</value>
        public string Version {
            get { return Get(ApiFields.Version); }
            set { Queue(ApiFields.Version, value); }
        }
        /// <summary>
        /// Gets or sets the zip.
        /// </summary>
        /// <value>The zip.</value>
        public string Zip {
            get { return Get(ApiFields.Zip); }
            set { Queue(ApiFields.Zip, value); }
        }



        #endregion

    }
}
