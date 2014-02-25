using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AuthorizeNet {

    public enum ValidationMode {
        None,
        TestMode,
        LiveMode,
    }

    /// <summary>
    /// This is an abstraction for use with the CIM API. It's a partial class so you can combine it with your class as needed.
    /// </summary>
    public partial class Customer {


        public Customer() {
            //default it to something
            this.ID = Guid.NewGuid().ToString();

            this.ShippingAddresses = new List<Address>();
            this.PaymentProfiles = new List<PaymentProfile>();
        }

        public string ID { get; set; }
        public string ProfileID { get; set; }
        public string Description { get; set; }
        public string Email { get; set; }
        public Address BillingAddress { get; set; }
        public IList<Address> ShippingAddresses { get; set; }
        public IList<PaymentProfile> PaymentProfiles { get; set; }

        internal static AuthorizeNet.APICore.validationModeEnum ToValidationMode(ValidationMode mode) {
            switch (mode) {
                case ValidationMode.None: return AuthorizeNet.APICore.validationModeEnum.none;
                case ValidationMode.TestMode: return AuthorizeNet.APICore.validationModeEnum.testMode;
                case ValidationMode.LiveMode: return AuthorizeNet.APICore.validationModeEnum.liveMode;
                default: return (AuthorizeNet.APICore.validationModeEnum)mode;
            }
        }
    }
}
