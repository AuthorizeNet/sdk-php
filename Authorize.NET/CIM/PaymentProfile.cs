using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using AuthorizeNet.APICore;

namespace AuthorizeNet {

    /// <summary>
    /// An abstraction for the AuthNET API, allowing you store credit card information with Authorize.net
    /// </summary>
    public class PaymentProfile {

        public Address BillingAddress { get; set; }
        public string ProfileID { get; set; }
        public bool IsBusiness { get; set; }
        
        public string DriversLicenseNumber { get; set; }
        public string DriversLicenseDOB { get; set; }
        public string DriversLicenseState { get; set; }

        public string CardNumber { get; set; }
        public string CardType { get; set; }
        public string CardExpiration { get; set; }
        public string CardCode { get; set; }
        public string TaxID { get; set; }


        /// <summary>
        /// Creates an API object, ready to send to AuthNET servers.
        /// </summary>
        /// <returns></returns>
        public customerPaymentProfileExType ToAPI() {
            var result = new customerPaymentProfileExType();
            result.billTo = this.BillingAddress.ToAPIType();
            result.customerPaymentProfileId = this.ProfileID;
            
            if (!String.IsNullOrEmpty(this.DriversLicenseNumber)) {
                result.driversLicense = new driversLicenseType();
                result.driversLicense.dateOfBirth = this.DriversLicenseDOB;
                result.driversLicense.number = this.DriversLicenseNumber;
                result.driversLicense.state = this.DriversLicenseState;
            }

            if (this.IsBusiness) {
                result.customerType = customerTypeEnum.business;
            } else {
                result.customerType = customerTypeEnum.individual;
            }
            result.customerTypeSpecified = true;
            
            if (!String.IsNullOrEmpty(this.CardNumber)) {
                var card = new creditCardType();
                card.cardCode = this.CardCode;
                card.cardNumber = this.CardNumber;
                card.expirationDate = this.CardExpiration;
                result.payment.Item = card;
            }
            if (!String.IsNullOrEmpty(this.TaxID)) {
                result.taxId = this.TaxID;
            }
            return result;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="PaymentProfile"/> class, using the passed-in API type to create the profile.
        /// </summary>
        /// <param name="apiType">Type of the API.</param>
        public PaymentProfile(customerPaymentProfileMaskedType apiType) {
            
            if(apiType.billTo!=null)
                this.BillingAddress = new Address(apiType.billTo);
            
            this.ProfileID = apiType.customerPaymentProfileId;
            
            if (apiType.driversLicense!=null) {
                this.DriversLicenseNumber = apiType.driversLicense.number;
                this.DriversLicenseState = apiType.driversLicense.state;
                this.DriversLicenseDOB = apiType.driversLicense.dateOfBirth;
            }

            if (apiType.customerTypeSpecified) {
                this.IsBusiness = apiType.customerType == customerTypeEnum.business;
            } else {
                this.IsBusiness = false;
            }

            if (apiType.payment != null) {
                var card = (creditCardMaskedType)apiType.payment.Item;
                this.CardType = card.cardType;
                this.CardNumber = card.cardNumber;
                this.CardExpiration = card.expirationDate;
            }
            this.TaxID = apiType.taxId;
        }

    }

    public partial class ProfileAmountType
    {
        public string ID { get; set; }
        public ProfileAmountType() { }


    }
}
