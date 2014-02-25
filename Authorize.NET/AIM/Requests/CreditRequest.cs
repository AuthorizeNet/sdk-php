using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AuthorizeNet {
    /// <summary>
    /// Credits, or refunds, the amount back to the user
    /// </summary>
    public class CreditRequest:GatewayRequest {

        /// <summary>
        /// Initializes a new instance of the <see cref="CreditRequest"/> class.
        /// </summary>
        /// <param name="transactionId">The transaction id.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="cardNumber">The card number.</param>
        public CreditRequest(string transactionId, decimal amount, string cardNumber) {

            this.SetApiAction(RequestAction.Credit);

            this.Queue(ApiFields.TransactionID, transactionId);
            this.Queue(ApiFields.Amount, amount.ToString());
            this.Queue(ApiFields.CreditCardNumber, cardNumber);

        }
    }
}
