using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AuthorizeNet {
    /// <summary>
    /// A request representing a Capture - the final transfer of funds that happens after an auth.
    /// </summary>
    public class CaptureRequest:GatewayRequest {

        /// <summary>
        /// Initializes a new instance of the <see cref="CaptureRequest"/> class.
        /// </summary>
        /// <param name="amount">The amount.</param>
        /// <param name="transactionId">The transaction id.</param>
        /// <param name="authCode">The auth code.</param>
        public CaptureRequest(decimal amount, string transactionId, string authCode) {
            this.SetApiAction(RequestAction.Capture);
            this.Queue(ApiFields.Amount, amount.ToString());
            this.Queue(ApiFields.TransactionID, transactionId);
            this.Queue(ApiFields.AuthorizationCode, authCode);
        }

    }
}
