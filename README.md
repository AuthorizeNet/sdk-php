Authorize.Net PHP SDK
======================

[![Build Status] (https://travis-ci.org/AuthorizeNet/sdk-php.png?branch=master)]
(https://travis-ci.org/AuthorizeNet/sdk-php)


## License
Proprietary, see the provided `license.md`.

## Requirements

- PHP 5.3+ *(>=5.3.10 recommended)*
- cURL PHP Extension
- JSON PHP Extension
- SimpleXML PHP Extension
- An Authorize.Net Merchant Account or Sandbox Account. You can get a 
	free sandbox account at http://developer.authorize.net/sandbox/

## Autoloading

[`Composer`](http://getcomposer.org) currently has a [MITM](https://github.com/composer/composer/issues/1074)
security vulnerability.  However, if you wish to use it, require its autoloader in
your script or bootstrap file:
```php
require 'vendor/autoload.php';
```
*Note: you'll need a composer.json file with the following require section and to run
`composer update`.*
```json
"require": {
    "authorizenet/authorizenet": "~1.8"
}
```

Alternatively, we provide a custom `SPL` autoloader:
```php
require 'path/to/anet_php_sdk/autoload.php';
```

## Authentication
To authenticate with the Authorize.Net API you will need to retrieve your API Login ID and Transaction Key from the [`Merchant Interface`](https://account.authorize.net/).  You can find these details in the Settings section.
If you need a sandbox account you can sign up for one really easily [`here`](https://developer.authorize.net/sandbox/).

Once you have your keys simply plug them into the appropriate variables as per the samples below.

````php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
````

## Usage Examples

See below for basic usage examples. View the `tests/` folder for more examples of
each API.  Additional documentation is in the `docs/` folder.
      
### AuthorizeNetAIM.php Quick Usage Example

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
    
### AuthorizeNetAIM.php Advanced Usage Example

```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
define("AUTHORIZENET_SANDBOX", true);
$auth         = new AuthorizeNetAIM;
$auth->amount = "45.00";

// Use eCheck:
$auth->setECheck(
    '121042882',
    '123456789123',
    'CHECKING',
    'Bank of Earth',
    'Jane Doe',
    'WEB'
);

// Set multiple line items:
$auth->addLineItem('item1', 'Golf tees', 'Blue tees', '2', '5.00', 'N');
$auth->addLineItem('item2', 'Golf shirt', 'XL', '1', '40.00', 'N');

// Set Invoice Number:
$auth->invoice_num = time();

// Set a Merchant Defined Field:
$auth->setCustomField("entrance_source", "Search Engine");

// Authorize Only:
$response  = $auth->authorizeOnly();

if ($response->approved) {
    $auth_code = $response->transaction_id;

    // Now capture:
    $capture = new AuthorizeNetAIM;
    $capture_response = $capture->priorAuthCapture($auth_code);

    // Now void:
    $void = new AuthorizeNetAIM;
    $void_response = $void->void($capture_response->transaction_id);
}
```

### AuthorizeNetARB.php Usage Example

```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
$subscription                          = new AuthorizeNet_Subscription;
$subscription->name                    = "PHP Monthly Magazine";
$subscription->intervalLength          = "1";
$subscription->intervalUnit            = "months";
$subscription->startDate               = "2011-03-12";
$subscription->totalOccurrences        = "12";
$subscription->amount                  = "12.99";
$subscription->creditCardCardNumber    = "6011000000000012";
$subscription->creditCardExpirationDate= "2018-10";
$subscription->creditCardCardCode      = "123";
$subscription->billToFirstName         = "Rasmus";
$subscription->billToLastName          = "Doe";

// Create the subscription.
$request         = new AuthorizeNetARB;
$response        = $request->createSubscription($subscription);
$subscription_id = $response->getSubscriptionId();
```

### AuthorizeNetCIM.php Usage Example

```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
$request = new AuthorizeNetCIM;
// Create new customer profile
$customerProfile                     = new AuthorizeNetCustomer;
$customerProfile->description        = "Description of customer";
$customerProfile->merchantCustomerId = time();
$customerProfile->email              = "test@domain.com";
$response = $request->createCustomerProfile($customerProfile);
if ($response->isOk()) {
    $customerProfileId = $response->getCustomerProfileId();
}
```

### AuthorizeNetSIM.php Usage Example

```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_MD5_SETTING", "");
$message = new AuthorizeNetSIM;
if ($message->isAuthorizeNet()) {
    $transactionId = $message->transaction_id;
}
```
    
### AuthorizeNetDPM.php Usage Example

```php
$url             = "http://YOUR_DOMAIN.com/direct_post.php";
$api_login_id    = 'YOUR_API_LOGIN_ID';
$transaction_key = 'YOUR_TRANSACTION_KEY';
$md5_setting     = 'YOUR_MD5_SETTING'; // Your MD5 Setting
$amount          = "5.99";
AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, $md5_setting);
```

### AuthorizeNetCP.php Usage Example

```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
define("AUTHORIZENET_MD5_SETTING", "");
$sale              = new AuthorizeNetCP;
$sale->amount      = '59.99';
$sale->device_type = '4';
$sale->setTrack1Data('%B4111111111111111^CARDUSER/JOHN^1803101000000000020000831000000?');
$response = $sale->authorizeAndCapture();
$trans_id = $response->transaction_id;
```

### AuthorizeNetTD.php Usage Example

```php
define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
$request  = new AuthorizeNetTD;
$response = $request->getTransactionDetails("12345");
echo $response->xml->transaction->transactionStatus;
```

## Testing

Integration tests for the AuthorizeNet SDK are in the `tests` directory. These tests
are mainly for SDK development. However, you can also browse through them to find
more usage examples for the various APIs.

- Run `composer update --dev` to load the `PHPUnit` test library.
- Copy the `phpunit.xml.dist` file to `phpunit.xml` and enter your merchant
  credentials in the constant fields.
- Run `vendor/bin/phpunit` to run the test suite.

*You'll probably want to disable emails on your sandbox account.*
    
### Test Credit Card Numbers

| Card Type                  | Card Number      |
|----------------------------|------------------|
| American Express Test Card | 370000000000002  |
| Discover Test Card         | 6011000000000012 |
| Visa Test Card             | 4007000000027    |
| Second Visa Test Card      | 4012888818888    |
| JCB                        | 3088000000000017 |
| Diners Club/ Carte Blanche | 38000000000006   |

*Set the expiration date to anytime in the future.*

## PHPDoc

Add PhpDocumentor to your composer.json and run `composer update --dev`:
```json
"require-dev": {
    "phpdocumentor/phpdocumentor": "*"
}
```
To autogenerate PHPDocs run:
```shell
vendor/bin/phpdoc -t doc/api/ -d lib
```

## New Model

We’re exploring a new model of maintaining the SDKs which allows us to be more responsive to API changes.  This model is consistent across the different SDK languages, which is great for us, however we do not want to sacrifice your productivity by losing the inherent efficiencies in the PHP language or our object model.  To this end we’re introducing the new model as purely “experimental” at this time and we would appreciate your feedback.  Let us know what you really think!  Here’s an example of a server side call with ApplePay data in the new model.

### Apple Pay Example
You'll need to introduce some new dependencies into composer.json
````json
{

  "require": {
  "php": ">=5.2.0",
  "ext-curl": "*",
  "authorizenet/authorizenet": "1.8.3",
  "jms/serializer": "xsd2php-dev as 0.18.0"
},
"require-dev": {
  "goetas/xsd2php": "2.*@dev",
  "goetas/xsd-reader": "2.*@dev"
},
"repositories": [{
	"type": "vcs",
	"url": "https://github.com/goetas/serializer.git"
	}]

}
````

Here's the PHP code :

````php
  <?php
  require 'vendor/autoload.php';

  use net\authorize\api\contract\v1 as AnetAPI;
  use net\authorize\api\controller as AnetController;

  define("AUTHORIZENET_LOG_FILE", "phplog");
   
  $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  $merchantAuthentication->setName("5KP3u95bQpv");
  $merchantAuthentication->setTransactionKey("4Ktq966gC55GAX7S");
  $refId = 'ref' . time();

  $op = new AnetAPI\OpaqueDataType();
  $op->setDataDescriptor("COMMON.APPLE.INAPP.PAYMENT");
  $op->setDataValue("eyJkYXRhIjoiQkRQTldTdE1tR2V3UVVXR2c0bzdFXC9qKzFjcTFUNzhxeVU4NGI2N2l0amNZSTh3UFlBT2hzaGpoWlBycWRVcjRYd1BNYmo0emNHTWR5KysxSDJWa1BPWStCT01GMjV1YjE5Y1g0bkN2a1hVVU9UakRsbEIxVGdTcjhKSFp4Z3A5ckNnc1NVZ2JCZ0tmNjBYS3V0WGY2YWpcL284WkliS25yS1E4U2gwb3VMQUtsb1VNbit2UHU0K0E3V0tycXJhdXo5SnZPUXA2dmhJcStIS2pVY1VOQ0lUUHlGaG1PRXRxK0grdzB2UmExQ0U2V2hGQk5uQ0hxenpXS2NrQlwvMG5xTFpSVFliRjBwK3Z5QmlWYVdIZWdoRVJmSHhSdGJ6cGVjelJQUHVGc2ZwSFZzNDhvUExDXC9rXC8xTU5kNDdrelwvcEhEY1JcL0R5NmFVTStsTmZvaWx5XC9RSk4rdFMzbTBIZk90SVNBUHFPbVhlbXZyNnhKQ2pDWmxDdXcwQzltWHpcL29iSHBvZnVJRVM4cjljcUdHc1VBUERwdzdnNjQybTRQendLRitIQnVZVW5lV0RCTlNEMnU2amJBRzMiLCJ2ZXJzaW9uIjoiRUNfdjEiLCJoZWFkZXIiOnsiYXBwbGljYXRpb25EYXRhIjoiOTRlZTA1OTMzNWU1ODdlNTAxY2M0YmY5MDYxM2UwODE0ZjAwYTdiMDhiYzdjNjQ4ZmQ4NjVhMmFmNmEyMmNjMiIsInRyYW5zYWN0aW9uSWQiOiJjMWNhZjVhZTcyZjAwMzlhODJiYWQ5MmI4MjgzNjM3MzRmODViZjJmOWNhZGYxOTNkMWJhZDlkZGNiNjBhNzk1IiwiZXBoZW1lcmFsUHVibGljS2V5IjoiTUlJQlN6Q0NBUU1HQnlxR1NNNDlBZ0V3Z2ZjQ0FRRXdMQVlIS29aSXpqMEJBUUloQVBcL1wvXC9cLzhBQUFBQkFBQUFBQUFBQUFBQUFBQUFcL1wvXC9cL1wvXC9cL1wvXC9cL1wvXC9cL1wvXC9cL01Gc0VJUFwvXC9cL1wvOEFBQUFCQUFBQUFBQUFBQUFBQUFBQVwvXC9cL1wvXC9cL1wvXC9cL1wvXC9cL1wvXC9cLzhCQ0JheGpYWXFqcVQ1N1BydlZWMm1JYThaUjBHc014VHNQWTd6ancrSjlKZ1N3TVZBTVNkTmdpRzV3U1RhbVo0NFJPZEpyZUJuMzZRQkVFRWF4ZlI4dUVzUWtmNHZPYmxZNlJBOG5jRGZZRXQ2ek9nOUtFNVJkaVl3cFpQNDBMaVwvaHBcL200N242MHA4RDU0V0s4NHpWMnN4WHM3THRrQm9ONzlSOVFJaEFQXC9cL1wvXC84QUFBQUFcL1wvXC9cL1wvXC9cL1wvXC9cLys4NXZxdHB4ZWVoUE81eXNMOFl5VlJBZ0VCQTBJQUJHbStnc2wwUFpGVFwva0RkVVNreHd5Zm84SnB3VFFRekJtOWxKSm5tVGw0REdVdkFENEdzZUdqXC9wc2hCWjBLM1RldXFEdFwvdERMYkUrOFwvbTB5Q21veHc9IiwicHVibGljS2V5SGFzaCI6IlwvYmI5Q05DMzZ1QmhlSEZQYm1vaEI3T28xT3NYMkora0pxdjQ4ek9WVmlRPSJ9LCJzaWduYXR1cmUiOiJNSUlEUWdZSktvWklodmNOQVFjQ29JSURNekNDQXk4Q0FRRXhDekFKQmdVckRnTUNHZ1VBTUFzR0NTcUdTSWIzRFFFSEFhQ0NBaXN3Z2dJbk1JSUJsS0FEQWdFQ0FoQmNsK1BmMytVNHBrMTNuVkQ5bndRUU1Ba0dCU3NPQXdJZEJRQXdKekVsTUNNR0ExVUVBeDRjQUdNQWFBQnRBR0VBYVFCQUFIWUFhUUJ6QUdFQUxnQmpBRzhBYlRBZUZ3MHhOREF4TURFd05qQXdNREJhRncweU5EQXhNREV3TmpBd01EQmFNQ2N4SlRBakJnTlZCQU1lSEFCakFHZ0FiUUJoQUdrQVFBQjJBR2tBY3dCaEFDNEFZd0J2QUcwd2daOHdEUVlKS29aSWh2Y05BUUVCQlFBRGdZMEFNSUdKQW9HQkFOQzgra2d0Z212V0YxT3pqZ0ROcmpURUJSdW9cLzVNS3ZsTTE0NnBBZjdHeDQxYmxFOXc0ZklYSkFEN0ZmTzdRS2pJWFlOdDM5ckx5eTd4RHdiXC81SWtaTTYwVFoyaUkxcGo1NVVjOGZkNGZ6T3BrM2Z0WmFRR1hOTFlwdEcxZDlWN0lTODJPdXA5TU1vMUJQVnJYVFBITmNzTTk5RVBVblBxZGJlR2M4N20wckFnTUJBQUdqWERCYU1GZ0dBMVVkQVFSUk1FK0FFSFpXUHJXdEpkN1laNDMxaENnN1lGU2hLVEFuTVNVd0l3WURWUVFESGh3QVl3Qm9BRzBBWVFCcEFFQUFkZ0JwQUhNQVlRQXVBR01BYndCdGdoQmNsK1BmMytVNHBrMTNuVkQ5bndRUU1Ba0dCU3NPQXdJZEJRQURnWUVBYlVLWUNrdUlLUzlRUTJtRmNNWVJFSW0ybCtYZzhcL0pYditHQlZRSmtPS29zY1k0aU5ERkFcL2JRbG9nZjlMTFU4NFRId05SbnN2VjNQcnY3UlRZODFncTBkdEM4elljQWFBa0NISUkzeXFNbko0QU91NkVPVzlrSmsyMzJnU0U3V2xDdEhiZkxTS2Z1U2dRWDhLWFFZdVpMazJScjYzTjhBcFhzWHdCTDNjSjB4Z2VBd2dkMENBUUV3T3pBbk1TVXdJd1lEVlFRREhod0FZd0JvQUcwQVlRQnBBRUFBZGdCcEFITUFZUUF1QUdNQWJ3QnRBaEJjbCtQZjMrVTRwazEzblZEOW53UVFNQWtHQlNzT0F3SWFCUUF3RFFZSktvWklodmNOQVFFQkJRQUVnWUJhSzNFbE9zdGJIOFdvb3NlREFCZitKZ1wvMTI5SmNJYXdtN2M2VnhuN1phc05iQXEzdEF0OFB0eSt1UUNnc3NYcVprTEE3a3oyR3pNb2xOdHY5d1ltdTlVandhcjFQSFlTK0JcL29Hbm96NTkxd2phZ1hXUnowbk1vNXkzTzFLelgwZDhDUkhBVmE4OFNyVjFhNUpJaVJldjNvU3RJcXd2NXh1WmxkYWc2VHI4dz09In0=");
  $paymentOne = new AnetAPI\PaymentType();
  $paymentOne->setOpaqueData($op);

  //create a transaction
  $transactionRequestType = new AnetAPI\TransactionRequestType();
  $transactionRequestType->setTransactionType( "authCaptureTransaction"); 
  $transactionRequestType->setAmount(151);
  $transactionRequestType->setPayment($paymentOne);

  $request = new AnetAPI\CreateTransactionRequest();
  $request->setMerchantAuthentication($merchantAuthentication);
  $request->setRefId( $refId);
  $request->setTransactionRequest( $transactionRequestType);

  $controller = new AnetController\CreateTransactionController($request);
  $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
 
  if ($response != null)
  {
    $tresponse = $response->getTransactionResponse();

    if (($tresponse != null) && ($tresponse->getResponseCode()=="1") )   
    {
      echo " AUTH CODE : " . $tresponse->getAuthCode() . "\n";
      echo " TRANS ID  : " . $tresponse->getTransId() . "\n";
    }
  }
  
?>
````
### Visa Checkout Examples
"Check out" the Visa Checkout samples at https://github.com/AuthorizeNet/sample-code-php/tree/master/VisaCheckout

