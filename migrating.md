If you are using AuthorizeNetAIM.php, AuthorizenetSIM.php, and other classes present in https://github.com/AuthorizeNet/sdk-php/tree/master/lib folder, they are no longer supported as part of PHP-SDK since August, 2018. Instead, it is recommended to use the new classses for AuthorizetNET APIs instead.

The current counterpart for AuthorizeNetAIM.php is to use the appropriate Payment Transaction API request (see [Payment Transactions section in API reference](https://developer.authorize.net/api/reference/index.html#payment-transactions)). You can follow the samples in sample code [PaymentTransactions](https://github.com/AuthorizeNet/sample-code-php/tree/master/PaymentTransactions) folder. To start with, you can follow the [charge-credit-card](https://github.com/AuthorizeNet/sample-code-php/blob/master/PaymentTransactions/charge-credit-card.php) example.

**Full list of classes that are no longer supported**
(Format: class - new category in the [API reference](https://developer.authorize.net/api/reference/index.html); [sample codes](https://github.com/AuthorizeNet/sample-code-php) directory)
- AuthorizeNetAIM.php - [PaymentTransactions](https://developer.authorize.net/api/reference/index.html#payment-transactions) ; sample code [directory](https://github.com/AuthorizeNet/sample-code-php/tree/master/PaymentTransactions)
 - AuthorizeNetARB.php - [RecurringBilling](https://developer.authorize.net/api/reference/index.html#recurring-billing) ; sample code [directory](https://github.com/AuthorizeNet/sample-code-php/tree/master/RecurringBilling)
 - AuthorizeNetCIM.php - [CustomerProfiles](https://developer.authorize.net/api/reference/index.html#customer-profiles) ; sample code [directory](https://github.com/AuthorizeNet/sample-code-php/tree/master/CustomerProfiles)
 - Hosted CIM - Replaced by [Accept Customer](https://developer.authorize.net/content/developer/en_us/api/reference/features/customer_profiles.html#Using_the_Accept_Customer_Hosted_Form)
 - AuthorizeNetCP.php - [PaymentTransactions](https://developer.authorize.net/api/reference/index.html#payment-transactions) ; sample code [directory](https://github.com/AuthorizeNet/sample-code-php/tree/master/PaymentTransactions)
 - AuthorizeNetDPM.php - Replaced by [Accept.JS](https://developer.authorize.net/api/reference/features/acceptjs.html); [sample accept application](https://github.com/AuthorizeNet/accept-sample-app)
 - AuthorizeNetSIM.php - Replaced by [Accept Hosted](https://developer.authorize.net/content/developer/en_us/api/reference/features/accept_hosted.html)
 - AuthorizeNetSOAP.php - [PaymentTransactions](https://developer.authorize.net/api/reference/index.html#payment-transactions)(Soap is deprecated in favor of XML APIs) ; sample code [directory](https://github.com/AuthorizeNet/sample-code-php/tree/master/PaymentTransactions)
 - AuthorizeNetTD.php - [Transaction Reporting](https://developer.authorize.net/api/reference/index.html#transaction-reporting) ; sample code [directory](https://github.com/AuthorizeNet/sample-code-php/tree/master/TransactionReporting)

 