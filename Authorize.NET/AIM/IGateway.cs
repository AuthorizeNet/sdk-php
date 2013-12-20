using System;
using System.Collections.Specialized;
using System.Xml;
namespace AuthorizeNet {
    public interface IGateway {
        string ApiLogin { get; set; }
        string TransactionKey { get; set; }
		IGatewayResponse Send (IGatewayRequest request);
        IGatewayResponse Send(IGatewayRequest request, string description);
    }
}
