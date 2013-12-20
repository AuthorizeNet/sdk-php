using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using AuthorizeNet.APICore;

namespace AuthorizeNet {


    /// <summary>
    /// This is an Address abstraction used for Billing and Shipping
    /// </summary>
    public partial class Address {

        public string ID { get; set; }
        public string Street { get; set; }
        public string State { get; set; }
        public string City { get; set; }
        public string Country { get; set; }
        public string Zip { get; set; }
        public string Company { get; set; }
        public string Fax { get; set; }
        public string First { get; set; }
        public string Last { get; set; }
        public string Phone { get; set; }

        public Address() {

        }

        /// <summary>
        /// Initializes a new instance of the <see cref="Address"/> class, resolving the given API Type
        /// </summary>
        /// <param name="fromType">From type.</param>
        public Address(nameAndAddressType fromType) {

            this.City = fromType.city;
            this.Company = fromType.company;
            this.Country = fromType.country;
            this.Last = fromType.lastName;
            this.First = fromType.firstName;
            this.Street = fromType.address;
            this.Zip = fromType.zip;
            this.State = fromType.state;
        }
        /// <summary>
        /// Initializes a new instance of the <see cref="Address"/> class, resolving the given API Type
        /// </summary>
        /// <param name="fromType">From type.</param>
        public Address(customerAddressType fromType) {

            this.City = fromType.city;
            this.Company = fromType.company;
            this.Country = fromType.country;
            this.Last = fromType.lastName;
            this.First = fromType.firstName;
            this.Street = fromType.address;
            this.Fax = fromType.faxNumber;
            this.Phone = fromType.phoneNumber;
            this.Zip = fromType.zip;
            this.State = fromType.state;
        }
        /// <summary>
        /// Initializes a new instance of the <see cref="Address"/> class, resolving the given API Type
        /// </summary>
        /// <param name="fromType">From type.</param>
        public Address(customerAddressExType fromType) {
            this.City = fromType.city;
            this.Company = fromType.company;
            this.Country = fromType.country;
            this.ID = fromType.customerAddressId;
            this.Last = fromType.lastName;
            this.First = fromType.firstName;
            this.Street = fromType.address;
            this.Fax = fromType.faxNumber;
            this.Phone = fromType.phoneNumber;
            this.State = fromType.state;
            this.Zip = fromType.zip;
        }

        /// <summary>
        /// Creates an API type for use with outbound requests to the Gateway. Mostly for internal use.
        /// </summary>
        /// <returns></returns>
        public customerAddressType ToAPIType() {
            var result = new customerAddressType();
            result.address = this.Street;
            result.city = this.City;
            result.company = this.Company;
            result.country = this.Country;
            result.faxNumber = this.Fax;
            result.firstName = this.First;
            result.lastName = this.Last;
            result.phoneNumber = this.Phone;
            result.state = this.State;
            result.zip = this.Zip;
            return result;
        }
        /// <summary>
        /// Creates an API type for use with outbound requests to the Gateway. Mostly for internal use.
        /// </summary>
        /// <returns></returns>
        public customerAddressExType ToAPIExType() {
            var result = new customerAddressExType();
            result.address = this.Street;
            result.city = this.City;
            result.company = this.Company;
            result.country = this.Country;
            result.faxNumber = this.Fax;
            result.firstName = this.First;
            result.lastName = this.Last;
            result.phoneNumber = this.Phone;
            result.state = this.State;
            result.zip = this.Zip;
            result.customerAddressId = this.ID;
            return result;
        }
        /// <summary>
        /// Creates an API type for use with outbound requests to the Gateway. Mostly for internal use.
        /// </summary>
        /// <returns></returns>
        public nameAndAddressType ToAPINameAddressType() {
            var result = new nameAndAddressType();
            result.address = this.Street;
            result.city = this.City;
            result.company = this.Company;
            result.country = this.Country;
            result.firstName = this.First;
            result.lastName = this.Last;
            result.state = this.State;
            result.zip = this.Zip;
            return result;
        }
    }
}
