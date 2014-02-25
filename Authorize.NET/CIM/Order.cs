using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using AuthorizeNet.APICore;

namespace AuthorizeNet {

    /// <summary>
    /// This is an abstraction for the AuthNET API so you can specify detailed order information.
    /// </summary>
    public partial class Order {

        internal List<lineItemType> _lineItems;

        /// <summary>
        /// Initializes a new instance of the <see cref="Order"/> class.
        /// </summary>
        /// <param name="profileID">The profile ID.</param>
        /// <param name="paymentProfileId">The payment profile id.</param>
        /// <param name="shippingAddressID">The shipping address ID.</param>
        public Order(string profileID, string paymentProfileId, string shippingAddressID) {
            _lineItems = new List<lineItemType>();

            this.ID = Guid.NewGuid().ToString();
            this.CustomerProfileID = profileID;
            this.PaymentProfileID = paymentProfileId;
            if (!String.IsNullOrEmpty(shippingAddressID)) {
                this.ShippingAddressProfileID = shippingAddressID;
            }
        }

        public string ID { get; set; }
        public string InvoiceNumber { get; set; }
        public string Description { get; set; }
        public string PONumber { get; set; }
        public bool? TaxExempt { get; set; }
        public bool? RecurringBilling { get; set; }

        public decimal Amount { get; set; }
        public string ShippingName { get; set; }
        public decimal ShippingAmount { get; set; }
        public string SalesTaxName { get; set; }
        public decimal SalesTaxAmount { get; set; }

        public string ShippingAddressProfileID { get; set; }
        public string PaymentProfileID { get; set; }
        public string CustomerProfileID { get; set; }

        public string CardCode { get; set; }

        public decimal SubTotal {
            get {
                if (_lineItems.Count > 0) {
                    return _lineItems.Sum(x => x.quantity * x.unitPrice);
                } else {
                    return Amount;
                }
            }
        }
        public decimal Total {
            get {
                return SubTotal + SalesTaxAmount + ShippingAmount;
            }
        }

        public void RemoveLineItem(string ID) {
            var line = _lineItems.FirstOrDefault(x => x.itemId == ID);
            if (line != null) {
                _lineItems.Remove(line);
            }
        }

        public void AddLineItem(string ID, string name, string description, int quantity, decimal unitPrice, bool? taxable) {
            if (_lineItems.Any(x => x.itemId == ID)) {
                var line = _lineItems.First(x => x.itemId == ID);
                line.quantity += quantity;
            } else {
                var item = new lineItemType {
                    description = Description,
                    itemId = ID,
                    name = name,
                    quantity = quantity,
                    unitPrice = unitPrice,
                };
                if (taxable.HasValue) {
                    item.taxable = taxable.Value;
                    item.taxableSpecified = true;

                }
                _lineItems.Add(item);
            }
        }

    }
}
