using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using AuthorizeNet.APICore;

namespace AuthorizeNet {

    public enum BillingIntervalUnits {
        Days,
        Months
    }

    /// <summary>
    /// This is the abstracted SubscriptionRequest class - it provides a simplified way of dealing with the underlying
    /// ARB API. This class uses a Fluent Interface to build out the request - creating only what you need.
    /// </summary>
    public partial class SubscriptionRequest : ISubscriptionRequest {
        private SubscriptionRequest() {
            this.BillingIntervalUnits = BillingIntervalUnits.Months;
            this.BillingInterval = 1;
            //the default value for no end date
            this.BillingCycles = 9999;
            this.StartsOn = DateTime.Today;
        }

        //Factory
        public static SubscriptionRequest CreateMonthly(string email, string subscriptionName, decimal amount) {
            return CreateMonthly(email, subscriptionName, amount,9999);
        }
        /// <summary>
        /// Creates a monthly subscription request.
        /// </summary>
        /// <param name="email">The email.</param>
        /// <param name="subscriptionName">Name of the subscription.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="numberOfBillings">The number of billings. So if you wanted to create a monthly subscription that lasts for a year - this would be 12</param>
        /// <returns></returns>
       public static SubscriptionRequest CreateMonthly(string email, string subscriptionName, decimal amount, short numberOfBillings) {
            var sub = new SubscriptionRequest();
            sub.CustomerEmail = email;
            sub.Amount = amount;
            sub.SubscriptionName = subscriptionName;
            sub.BillingCycles = numberOfBillings;
            return sub;
        }
       public static SubscriptionRequest CreateAnnual(string email, string subscriptionName, decimal amount) {
           return CreateAnnual(email, subscriptionName, amount, 9999);
       }

        /// <summary>
        /// Returns a new subscription request.
        /// </summary>
       /// <returns>SubscriptionRequest object.</returns>
       public static SubscriptionRequest CreateNew()
       {
           return new SubscriptionRequest();
       }

       /// <summary>
       /// Creates an annual subscription.
       /// </summary>
       /// <param name="email">The email.</param>
       /// <param name="subscriptionName">Name of the subscription.</param>
       /// <param name="amount">The amount.</param>
       /// <param name="numberOfBillings">The number of billings. So if you wanted to create a yearly subscription that lasts for a year - this would be 1</param>
       /// <returns></returns>
       public static SubscriptionRequest CreateAnnual(string email, string subscriptionName, decimal amount, short numberOfBillings) {
            var sub = new SubscriptionRequest();
            sub.CustomerEmail = email;
            sub.Amount = amount;
            
            sub.SubscriptionName = subscriptionName;
            sub.BillingCycles = numberOfBillings;           
            sub.BillingInterval = 12;

            return sub;
        }

       /// <summary>
       /// Creates a weekly subscription that bills every 7 days.
       /// </summary>
       /// <param name="email">The email.</param>
       /// <param name="subscriptionName">Name of the subscription.</param>
       /// <param name="amount">The amount.</param>
       /// <returns></returns>
       public static SubscriptionRequest CreateWeekly(string email, string subscriptionName, decimal amount) {
           return CreateWeekly(email, subscriptionName, amount,9999);
       }
       /// <summary>
       /// Creates a weekly subscription that bills every 7 days. 
       /// </summary>
       /// <param name="email">The email.</param>
       /// <param name="subscriptionName">Name of the subscription.</param>
       /// <param name="amount">The amount.</param>
       /// <param name="numberOfBillings">The number of billings. If you want this subscription to last for a month, this should be set to 4</param>
       /// <returns></returns>
       public static SubscriptionRequest CreateWeekly(string email, string subscriptionName, decimal amount, short numberOfBillings) {
            var sub = new SubscriptionRequest();
            sub.CustomerEmail = email;
            sub.Amount = amount;
            
            sub.SubscriptionName = subscriptionName;
            sub.BillingCycles = numberOfBillings;           

            sub.BillingIntervalUnits = BillingIntervalUnits.Days;
            sub.BillingInterval = 7;

            return sub;
        }

        //Fluent bits
       /// <summary>
       /// Adds a credit card payment to the subscription. This is required.
       /// </summary>
       /// <param name="firstName">The first name.</param>
       /// <param name="lastName">The last name.</param>
       /// <param name="cardNumber">The card number.</param>
       /// <param name="cardExpirationYear">The card expiration year.</param>
       /// <param name="cardExpirationMonth">The card expiration month.</param>
       /// <returns></returns>
        public SubscriptionRequest UsingCreditCard(string firstName, string lastName, string cardNumber, int cardExpirationYear, int cardExpirationMonth) {
            this.CardNumber = cardNumber;
            this.CardExpirationYear = cardExpirationYear;
            this.CardExpirationMonth = cardExpirationMonth;

            this.BillingAddress = new Address{
                First = firstName,
                Last = lastName
            };

            return this;
        }

        /// <summary>
        /// Adds a full billing address - which is required for a credit card.
        /// </summary>
        /// <param name="add">The add.</param>
        /// <returns></returns>
        public SubscriptionRequest WithBillingAddress(Address add) {
            this.BillingAddress = add;
            return this;
        }


        /// <summary>
        /// Adds a shipping address to the request.
        /// </summary>
        /// <param name="add">The address to ship to</param>
        /// <returns></returns>
        public SubscriptionRequest WithShippingAddress(Address add) {
            this.ShippingAddress = add;
            return this;
        }

        /// <summary>
        /// Sets a trial period for the subscription. This is part of the overall subscription plan.
        /// </summary>
        /// <param name="trialBillingCycles">The trial billing cycles.</param>
        /// <param name="trialAmount">The trial amount.</param>
        /// <returns></returns>
        public SubscriptionRequest SetTrialPeriod(short trialBillingCycles, decimal trialAmount) {
            this.TrialBillingCycles = trialBillingCycles;
            this.TrialAmount = trialAmount;

            return this;
        }

        public string CustomerEmail { get; set; }
        public string CustomerID { get; set; }
        public string SubscriptionID { get; set; }
        public string SubscriptionName { get; set; }
        public short BillingInterval { get; set; }
        public BillingIntervalUnits BillingIntervalUnits { get; set; }
        public DateTime StartsOn { get; set; }
        public short BillingCycles { get; set; }
        public short TrialBillingCycles { get; set; }
        public decimal Amount { get; set; }
        public decimal TrialAmount { get; set; }

        //CreditCard
        public string CardNumber { get; set; }
        public int CardExpirationYear { get; set; }
        public int CardExpirationMonth { get; set; }
        public string CardCode { get; set; }

        public Address BillingAddress { get; set; }
        public Address ShippingAddress { get; set; }

        public string Invoice { get; set; }
        public string Description { get; set; }

        /// <summary>
        /// This is mostly for internal processing needs - it takes the SubscriptionRequest and turns it into something the Gateway can serialize.
        /// </summary>
        /// <returns></returns>
        public ARBSubscriptionType ToAPI(){

            var sub = new ARBSubscriptionType();
            sub.name = this.SubscriptionName;

            if (!String.IsNullOrEmpty(this.CardNumber)) {
                var creditCard = new creditCardType();
                creditCard.cardNumber = this.CardNumber;
                creditCard.expirationDate = string.Format("{0}-{1}", this.CardExpirationYear, this.CardExpirationMonth);  // required format for API is YYYY-MM
                sub.payment = new paymentType();
                sub.payment.Item = creditCard;
            } else {
                throw new InvalidOperationException("Need a credit card number to set up this subscription");
            }
            
            if(this.BillingAddress!=null)
                sub.billTo = this.BillingAddress.ToAPINameAddressType();
            if (this.ShippingAddress != null)
                sub.shipTo = this.ShippingAddress.ToAPINameAddressType();

            sub.paymentSchedule = new paymentScheduleType();
            sub.paymentSchedule.startDate = this.StartsOn;
            sub.paymentSchedule.startDateSpecified = true;

            sub.paymentSchedule.totalOccurrences = this.BillingCycles;
            sub.paymentSchedule.totalOccurrencesSpecified = true;

            // free 1 month trial
            if (this.TrialBillingCycles > 0) {
                sub.paymentSchedule.trialOccurrences = this.TrialBillingCycles;
                sub.paymentSchedule.trialOccurrencesSpecified = true;
            }

            if (this.TrialAmount > 0) {
                sub.trialAmount = this.TrialAmount;
                sub.trialAmountSpecified = true;
            }

            sub.amount = this.Amount;
            sub.amountSpecified = true;

            sub.paymentSchedule.interval = new paymentScheduleTypeInterval();
            sub.paymentSchedule.interval.length = this.BillingInterval;
            
            if (this.BillingIntervalUnits == BillingIntervalUnits.Months) {
                sub.paymentSchedule.interval.unit = ARBSubscriptionUnitEnum.months;
            } else {
                sub.paymentSchedule.interval.unit = ARBSubscriptionUnitEnum.days;
            }
            sub.customer = new customerType();
            sub.customer.email = this.CustomerEmail;

            sub.order = new orderType();
            sub.order.description = this.Description;
            sub.order.invoiceNumber = this.Invoice;

            sub.customer.id = this.CustomerID;

            return sub;

        }

        /// <summary>
        /// The Update function won't accept a change to some values - specifically the billing interval. This creates a request
        /// that the API can understand for updates only
        /// </summary>
        /// <returns></returns>
        public ARBSubscriptionType ToUpdateableAPI() {

            var sub = new ARBSubscriptionType();
            sub.name = this.SubscriptionName;

            if (!String.IsNullOrEmpty(this.CardNumber)) {
                var creditCard = new creditCardType();
                creditCard.cardNumber = this.CardNumber;
                creditCard.expirationDate = string.Format("{0}-{1}", this.CardExpirationYear, this.CardExpirationMonth);  // required format for API is YYYY-MM
                sub.payment = new paymentType();
                sub.payment.Item = creditCard;
            } else {
                throw new InvalidOperationException("Need a credit card number to set up this subscription");
            }

            if (this.BillingAddress != null)
                sub.billTo = this.BillingAddress.ToAPINameAddressType();
            if (this.ShippingAddress != null)
                sub.shipTo = this.ShippingAddress.ToAPINameAddressType();

            sub.paymentSchedule = new paymentScheduleType();
            sub.paymentSchedule.totalOccurrences = this.BillingCycles;
            sub.paymentSchedule.totalOccurrencesSpecified = true;

            sub.amount = this.Amount;
            sub.amountSpecified = true;

            sub.customer = new customerType();
            sub.customer.email = this.CustomerEmail;
            sub.customer.id = this.CustomerID;

            return sub;

        }

    }
}
