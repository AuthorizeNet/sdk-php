using System;
using AuthorizeNet.APICore;

namespace AuthorizeNet {
    public interface ISubscriptionRequest {
        decimal Amount { get; set; }
        AuthorizeNet.Address BillingAddress { get; set; }
        short BillingCycles { get; set; }
        short BillingInterval { get; set; }
        AuthorizeNet.BillingIntervalUnits BillingIntervalUnits { get; set; }
        string CardCode { get; set; }
        int CardExpirationMonth { get; set; }
        int CardExpirationYear { get; set; }
        string CardNumber { get; set; }
        string CustomerEmail { get; set; }
        string CustomerID { get; set; }
        AuthorizeNet.SubscriptionRequest SetTrialPeriod(short trialBillingCycles, decimal trialAmount);
        AuthorizeNet.Address ShippingAddress { get; set; }
        DateTime StartsOn { get; set; }
        string SubscriptionID { get; set; }
        string SubscriptionName { get; set; }
        string Description { get; set; }
        string Invoice { get; set; }
        ARBSubscriptionType ToAPI();
        ARBSubscriptionType ToUpdateableAPI();
        decimal TrialAmount { get; set; }
        short TrialBillingCycles { get; set; }
        AuthorizeNet.SubscriptionRequest UsingCreditCard(string firstName, string lastName, string cardNumber, int cardExpirationYear, int cardExpirationMonth);
        AuthorizeNet.SubscriptionRequest WithBillingAddress(AuthorizeNet.Address add);
        AuthorizeNet.SubscriptionRequest WithShippingAddress(AuthorizeNet.Address add);
    }
}
