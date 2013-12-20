using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Collections.Specialized;

namespace AuthorizeNet {
    
    /// <summary>
    /// A request that authorizes a transaction, no capture
    /// </summary>
    public class AuthorizationRequest:GatewayRequest {

        /// <summary>
        /// Initializes a new instance of the <see cref="AuthorizationRequest"/> class.
        /// </summary>
        /// <param name="cardNumber">The card number.</param>
        /// <param name="expirationMonthAndYear">The expiration month and year.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="description">The description.</param>
        public AuthorizationRequest(string cardNumber, string expirationMonthAndYear, decimal amount, string description) {
            this.SetApiAction(RequestAction.AuthorizeAndCapture);
            SetQueue(cardNumber, expirationMonthAndYear, amount, description);
        }
        /// <summary>
        /// Initializes a new instance of the <see cref="AuthorizationRequest"/> class.
        /// </summary>
        /// <param name="cardNumber">The card number.</param>
        /// <param name="expirationMonthAndYear">The expiration month and year.</param>
        /// <param name="amount">The amount.</param>
        /// <param name="description">The description.</param>
        /// <param name="includeCapture">if set to <c>true</c> [include capture].</param>
        public AuthorizationRequest(string cardNumber, string expirationMonthAndYear, decimal amount, string description, bool includeCapture)
        {
            if (includeCapture) {
                this.SetApiAction(RequestAction.AuthorizeAndCapture);
            } else {
                this.SetApiAction(RequestAction.Authorize);
            }
            SetQueue(cardNumber, expirationMonthAndYear, amount, description);
        }

        /// <summary>
        /// Loader for use with form POSTS from web
        /// </summary>
        /// <param name="post"></param>
        public AuthorizationRequest(NameValueCollection post) {
            this.SetApiAction(RequestAction.AuthorizeAndCapture);
            this.Queue(ApiFields.CreditCardNumber, post[ApiFields.CreditCardNumber]);
            this.Queue(ApiFields.CreditCardExpiration, post[ApiFields.CreditCardExpiration]);
            this.Queue(ApiFields.Amount, post[ApiFields.Amount]);
        }

        protected virtual void SetQueue(string cardNumber, string expirationMonthAndYear, decimal amount, string description) {
            this.Queue(ApiFields.CreditCardNumber, cardNumber);
            this.Queue(ApiFields.CreditCardExpiration, expirationMonthAndYear);
            this.Queue(ApiFields.Amount, amount.ToString());
            this.Queue(ApiFields.Description, description);
        }



		


    }
}
