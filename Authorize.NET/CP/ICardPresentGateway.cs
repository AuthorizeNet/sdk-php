using System;
namespace AuthorizeNet {
    public interface ICardPresentGateway {
        AuthorizeNet.IGatewayResponse Send(AuthorizeNet.IGatewayRequest request, string description);
    }
}
