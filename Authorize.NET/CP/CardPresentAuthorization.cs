using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AuthorizeNet {
    public class CardPresentAuthorizeAndCaptureRequest : CardPresentAuthorizationRequest {
        public CardPresentAuthorizeAndCaptureRequest(decimal amount, string track1, string track2) 
            :base(amount,track1,track2)
        {
            this.SetApiAction(RequestAction.AuthorizeAndCapture);
        }
        /// <summary>
        /// Initializes a new instance of the <see cref="CardPresentAuthorizeAndCaptureRequest"/> class.
        /// </summary>
        /// <param name="amount">The amount.</param>
        /// <param name="cardNumber">The card number.</param>
        /// <param name="expirationMonth">The expiration month.</param>
        /// <param name="expirationYear">The expiration year.</param>
        public CardPresentAuthorizeAndCaptureRequest(decimal amount, string cardNumber, string expirationMonth, string expirationYear)
            : base(amount, cardNumber,expirationMonth,expirationYear) {
            this.SetApiAction(RequestAction.AuthorizeAndCapture);
        }
    }
    public class CardPresentAuthorizationRequest:GatewayRequest {

        string _track1 = "";
        string _track2 = "";

        /// <summary>
        /// Initializes a new instance of the <see cref="CardPresentAuthorizationRequest"/> class using track data from a card reader.
        /// </summary>
        /// <param name="amount">The amount.</param>
        /// <param name="track1">The track1 data.</param>
        /// <param name="track2">The track2 data.</param>
        public CardPresentAuthorizationRequest(decimal amount, string track1, string track2) {
            this.SetApiAction(RequestAction.Authorize);

            //strip the sentinels...
            track1 = track1.Replace("%", "").Replace("?", "");
            track2 = track2.Replace(";", "").Replace("?", "");

            //this.Queue(ApiFields.CreditCardNumber, cardNumber);
            if (!String.IsNullOrEmpty(track1)) {
                this.Queue("x_track1", track1);
            }
            
            if (!String.IsNullOrEmpty(track2)) {
                this.Queue("x_track2", track2);
            }
            this.Queue(ApiFields.Amount, amount.ToString());
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="CardPresentAuthorizationRequest"/> class.
        /// </summary>
        /// <param name="amount">The amount.</param>
        /// <param name="cardNumber">The card number.</param>
        /// <param name="expirationMonth">The expiration month.</param>
        /// <param name="expirationYear">The expiration year.</param>
        public CardPresentAuthorizationRequest( decimal amount, string cardNumber, string expirationMonth, string expirationYear) {
            this.SetApiAction(RequestAction.Authorize);
            this.Queue(ApiFields.CreditCardNumber, cardNumber);
            this.Queue(ApiFields.CreditCardExpiration, string.Format("{0}{1}",expirationMonth,expirationYear));
            this.Queue(ApiFields.Amount, amount.ToString());
        }
    }
}
