using System;
using AuthorizeNet.APICore;
namespace AuthorizeNet {
    public interface ISubscriptionGateway {
        bool CancelSubscription(string subscriptionID);
        ISubscriptionRequest CreateSubscription(ISubscriptionRequest subscription);
        ARBSubscriptionStatusEnum GetSubscriptionStatus(string subscriptionID);
        bool UpdateSubscription(ISubscriptionRequest subscription);
    }
}
