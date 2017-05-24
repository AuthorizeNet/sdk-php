Authorize.Net PHP SDK
======================

[![Travis](https://img.shields.io/travis/AuthorizeNet/sdk-php/master.svg)](https://travis-ci.org/AuthorizeNet/sdk-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AuthorizeNet/sdk-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AuthorizeNet/sdk-php/?branch=master)
[![Packagist](https://img.shields.io/packagist/v/authorizenet/authorizenet.svg)](https://packagist.org/packages/authorizenet/authorizenet)


## License
Proprietary, see the provided `license.md`.

## Requirements

- PHP 5.5+
- cURL PHP Extension
- JSON PHP Extension
- SimpleXML PHP Extension
- An Authorize.Net Merchant Account or Sandbox Account. You can get a 
	free sandbox account at http://developer.authorize.net/hello_world/sandbox/

## Autoloading

We recommend using [`Composer`](http://getcomposer.org) *(note we never recommend you override the new secure-http default setting)*, don't forget to require its autoloader in
your script or bootstrap file:
```php
require 'vendor/autoload.php';
```
*Update your composer.json file as per the example below and then run
`composer update`.*

```json
{
  "require": {
  "php": ">=5.5",
  "ext-curl": "*",
  "authorizenet/authorizenet": "1.9.2"
  }
}
```

Alternatively, we provide a custom `SPL` autoloader:
```php
require 'path/to/anet_php_sdk/autoload.php';
```

## Authentication
To authenticate with the Authorize.Net API you will need to retrieve your API Login ID and Transaction Key from the [`Merchant Interface`](https://account.authorize.net/).  You can find these details in the Settings section.
If you need a sandbox account you can sign up for one really easily [`here`](https://developer.authorize.net/sandbox/).

Once you have your keys simply plug them into the appropriate variables, as per the below code dealing with the authentication part of the flow.

...
```php
use net\authorize\api\contract\v1 as AnetAPI;
```
...
```php
$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
$merchantAuthentication->setName("YOURLOGIN");
$merchantAuthentication->setTransactionKey("YOURKEY");
```
...

```php
$request = new AnetAPI\CreateTransactionRequest();
$request->setMerchantAuthentication($merchantAuthentication);
```
...

## Usage Examples

Apart from this README, you can find details and examples of using the SDK in the following places:
- [Developer Center Reference](http://developer.authorize.net/api/reference/index.html)
- [Github Sample Code Repositories](https://github.com/AuthorizeNet/sample-code-php)
      
      
### Quick Usage Example (with Charge Credit Card - Authorize and Capture)
Note: The following is a php console application. Ensure that you can invoke the php command from command line.
- Save the below code to a php file named, say, `charge-credit-card.php`
- Open command prompt and navigate to your SDK folder ( if want to run from a different folder, modify the `require` statement to have the full path to the SDK e.g. `require 'c:/anet-sdk-php/vendor/autoload.php'` in place of `require 'vendor/autoload.php'` )
- Update dependecies - e.g., With composer, type `composer update`
- Type `php [<path to folder containing the php file>\]charge-credit-card.php`

```php
require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
define("AUTHORIZENET_LOG_FILE", "phplog");

// Common setup for API credentials
$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
$merchantAuthentication->setName("556KThWQ6vf2");
$merchantAuthentication->setTransactionKey("9ac2932kQ7kN2Wzq");

// Create the payment data for a credit card
$creditCard = new AnetAPI\CreditCardType();
$creditCard->setCardNumber("4111111111111111");
$creditCard->setExpirationDate("2038-12");
$paymentOne = new AnetAPI\PaymentType();
$paymentOne->setCreditCard($creditCard);

// Create a transaction
$transactionRequestType = new AnetAPI\TransactionRequestType();
$transactionRequestType->setTransactionType( "authCaptureTransaction"); 
$transactionRequestType->setAmount(151.51);
$transactionRequestType->setPayment($paymentOne);

$request = new AnetAPI\CreateTransactionRequest();
$request->setMerchantAuthentication($merchantAuthentication);
$request->setTransactionRequest( $transactionRequestType);
$controller = new AnetController\CreateTransactionController($request);
$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);

if ($response != null)
{
	$tresponse = $response->getTransactionResponse();

	if (($tresponse != null) && ($tresponse->getResponseCode()=="1") )   
	{
		echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
		echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
	}
	else
	{
		echo  "Charge Credit Card ERROR :  Invalid response\n";
	}
}
else
{
	echo  "Charge Credit card Null response returned";
}
```
### Setting Production Environment  
Replace the environment constant in the execute method.  For example, in the method above:
```php
$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
```  

## Logging

The SDK generates a log with masking for sensitive data like credit card, expiration dates. The provided levels for logging are 
 `debug`, `info`, `warn`, `error`. Add ````use \net\authorize\util\LogFactory;````. Logger can be initialized using `$logger = LogFactory::getLog(get_class($this));`
The default log file `phplog` gets generated in the current folder. The subsequent logs are appended to the same file, unless the execution folder is changed, and a new log file is generated.

### Usage Examples
- Logging a string message `$logger->debug("Sending 'XML' Request type");`
- Logging xml strings `$logger->debug($xmlRequest);`
- Logging using formatting `$logger->debugFormat("Integer: %d, Float: %f, Xml-Request: %s\n", array(100, 1.29f, $xmlRequest));`

### Customizing Sensitive Tags
A local copy of [AuthorizedNetSensitiveTagsConfig.json](/lib/net/authorize/util/ANetSensitiveFields.php) gets generated when code invoking the logger first gets executed. The local file can later be edited by developer to re-configure what is masked and what is visible. (*Do not edit the JSON in the SDK*). 
- For each element of the `sensitiveTags` array, 
  - `tagName` field corresponds to the name of the property in object, or xml-tag that should be hidden entirely ( *XXXX* shown if no replacement specified ) or masked (e.g. showing the last 4 digits of credit card number).
  - `pattern`[<sup>[Note]</sup>](#regex-note) and `replacement`[<sup>[Note]</sup>](#regex-note) can be left `""`, if the default is to be used (as defined in [Log.php](/lib/net/authorize/util/Log.php)). `pattern` gives the regex to identify, while `replacement` defines the visible part.
  - `disableMask` can be set to *true* to allow the log to fully display that property in an object, or tag in a xml string.
- `sensitiveStringRegexes`[<sup>[Note]</sup>](#regex-note) has list of credit-card regexes. So if credit-card number is not already masked, it would get entirely masked.
- Take care of non-ascii characters (refer [manual](http://php.net/manual/en/regexp.reference.unicode.php)) while defining the regex, e.g. use 
`"pattern": "(\\p{N}+)(\\p{N}{4})"` instead of `"pattern": "(\\d+)(\\d{4})"`. Also note `\\` escape sequence is used.

**<a name="regex-note">Note</a>:**
**For any regex, no starting or ending '/' or any other delimiter should be defined. The '/' delimiter and unicode flag is added in the code.**

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
