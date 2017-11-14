Old Usage Examples (Of Deprecated SDK Functionality)
=======================================

# This documentation in this directoary and the objects it documents have been deprecated

**For the README for this repository, see `[README.md]`(/README.md) in the root level of the repository. For examples of how to interact with the current Authorize.Net API, see our new sample code GitHub repository at https://github.com/AuthorizeNet/sample-code-php.**

**What follows is the old README pertaining to this deprecated functionality:**

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
