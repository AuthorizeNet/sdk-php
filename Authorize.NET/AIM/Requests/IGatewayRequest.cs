using System;
namespace AuthorizeNet {
    public interface IGatewayRequest {
        IGatewayRequest AddCardCode(string cardCode);
        IGatewayRequest AddCustomer(string ID, string first, string last, string address, string state, string zip);
        IGatewayRequest AddDuty(decimal amount, string name, string description);
        IGatewayRequest AddDuty(decimal amount);
        IGatewayRequest AddFraudCheck();
        IGatewayRequest AddFraudCheck(string customerIP);
        IGatewayRequest AddFreight(decimal amount, string name, string description);
        IGatewayRequest AddFreight(decimal amount);
        IGatewayRequest AddInvoice(string invoiceNumber);
        IGatewayRequest AddLineItem(string itemID, string name, string description, int quantity, decimal price, bool taxable);
        IGatewayRequest AddMerchantValue(string key, string value);
        string Address { get; set; }
        IGatewayRequest AddShipping(string ID, string first, string last, string address, string state, string zip);
        IGatewayRequest AddTax(decimal amount, string name, string description);
        IGatewayRequest AddTax(decimal amount);
        string AllowPartialAuth { get; set; }
        string Amount { get; set; }
        AuthorizeNet.RequestAction ApiAction { get; }
        string AuthCode { get; set; }
        string AuthenticationIndicator { get; set; }
        string BankABACode { get; set; }
        string BankAccountName { get; set; }
        string BankAccountNumber { get; set; }
        AuthorizeNet.BankAccountType BankAccountType { get; set; }
        string BankCheckNumber { get; set; }
        string BankName { get; set; }
        string CardCode { get; set; }
        string CardholderAuthenticationValue { get; set; }
        string CardNum { get; set; }
        string City { get; set; }
        string Company { get; set; }
        string Country { get; set; }
        string CustId { get; set; }
        string CustomerIp { get; set; }
        string DelimChar { get; set; }
        string DelimData { get; set; }
        string Description { get; set; }
        string DuplicateWindow { get; set; }
        string Duty { get; set; }
        AuthorizeNet.EcheckType EcheckType { get; set; }
        string Email { get; set; }
        string EmailCustomer { get; set; }
        string EncapChar { get; set; }
        string ExpDate { get; set; }
        string Fax { get; set; }
        string FirstName { get; set; }
        string FooterEmailReceipt { get; set; }
        string Freight { get; set; }
        string Get(string key);
        string HeaderEmailReceipt { get; set; }
        string InvoiceNum { get; set; }
        string LastName { get; set; }
        string LineItem { get; set; }
        string Login { get; set; }
        string Method { get; set; }
        string Phone { get; set; }
        string PoNum { get; set; }
        System.Collections.Specialized.NameValueCollection Post { get; set; }
        void Queue(string key, string value);
        string RecurringBilling { get; set; }
        string RelayResponse { get; set; }
        string ShipToAddress { get; set; }
        string ShipToCity { get; set; }
        string ShipToCompany { get; set; }
        string ShipToCountry { get; set; }
        string ShipToFirstName { get; set; }
        string ShipToLastName { get; set; }
        string ShipToState { get; set; }
        string ShipToZip { get; set; }
        string SplitTenderId { get; set; }
        string State { get; set; }
        string Tax { get; set; }
        string TaxExempt { get; set; }
        string TestRequest { get; set; }
        string ToPostString();
        string TranKey { get; set; }
        string TransId { get; set; }
        string Type { get; set; }
        string Version { get; set; }
        string Zip { get; set; }
    }
}
