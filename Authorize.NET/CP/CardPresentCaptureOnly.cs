using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AuthorizeNet {
    /// <summary>
    /// Capture only function
    /// </summary>
    public class CardPresentCaptureOnly:GatewayRequest {
        /// <summary>
        /// Initializes a new instance of the <see cref="CardPresentCaptureOnly"/> class.
        /// </summary>
        /// <param name="authCode">The auth code.</param>
        public CardPresentCaptureOnly(string authCode) {
            this.SetApiAction(RequestAction.Capture);
            this.Queue(ApiFields.AuthorizationCode, authCode);
        }

    }
}
