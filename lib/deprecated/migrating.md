If you are using AuthorizeNetAIM.php, AuthorizenetSIM.php, and other classes present in https://github.com/AuthorizeNet/sdk-php/tree/master/lib folder, they are no longer supported as part of PHP-SDK since August, 2018. Instead, it is recommended to use the new classes for AuthorizetNET APIs instead.

The current counterpart for AuthorizeNetAIM.php is to use the appropriate Payment Transaction API request (see [Payment Transactions section in API reference](https://developer.authorize.net/api/reference/index.html#payment-transactions)). You can follow the samples in sample code [PaymentTransactions](https://github.com/AuthorizeNet/sample-code-php/tree/master/PaymentTransactions) folder. To start with, you can follow the [charge-credit-card](https://github.com/AuthorizeNet/sample-code-php/blob/master/PaymentTransactions/charge-credit-card.php) example.
## For details on the deprecation and replacement of legacy Authorize.Net methods, visit https://developer.authorize.net/api/upgrade_guide/.

## Full list of classes that are no longer supported
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


 
### Old AuthorizeNetAIM example: 
   ```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
define("AUTHORIZENET_SANDBOX", true);
$sale           = new AuthorizeNetAIM;
$sale->amount   = "5.99";
$sale->card_num = '6011000000000012';
$sale->exp_date = '04/15';
$response = $sale->authorizeAndCapture();
if ($response->approved) {
    $transaction_id = $response->transaction_id;
}
```
### Corresponding new model code (charge-credit-card):
```
require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");
$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
$merchantAuthentication->setName("YOURLOGIN");
$merchantAuthentication->setTransactionKey("YOURKEY");
// Create the payment data for a credit card
$creditCard = new AnetAPI\CreditCardType();
$creditCard->setCardNumber("6011000000000012");
$creditCard->setExpirationDate("2015-04");
$creditCard->setCardCode("123");

// Add the payment data to a paymentType object
$paymentOne = new AnetAPI\PaymentType();
$paymentOne->setCreditCard($creditCard);

$transactionRequestType = new AnetAPI\TransactionRequestType();
$transactionRequestType->setTransactionType("authCaptureTransaction");
$transactionRequestType->setAmount("5.99");
$transactionRequestType->setPayment($paymentOne);

// Assemble the complete transaction request
$request = new AnetAPI\CreateTransactionRequest();
$request->setMerchantAuthentication($merchantAuthentication);
$request->setTransactionRequest($transactionRequestType);

// Create the controller and get the response
$controller = new AnetController\CreateTransactionController($request);
$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

if ($response != null) {
// Check to see if the API request was successfully received and acted upon
if ($response->getMessages()->getResultCode() == "Ok") {
      // Since the API request was successful, look for a transaction response
      // and parse it to display the results of authorizing the card
      $tresponse = $response->getTransactionResponse();
        
      if ($tresponse != null && $tresponse->getMessages() != null) {
      echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
      echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
      echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
      echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
      echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
      }
  }
} 
```
