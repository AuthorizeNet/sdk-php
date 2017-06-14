Authorize.Net PHP SDK
======================

[![Travis](https://img.shields.io/travis/AuthorizeNet/sdk-php/master.svg)](https://travis-ci.org/AuthorizeNet/sdk-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AuthorizeNet/sdk-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AuthorizeNet/sdk-php/?branch=master)
[![Packagist](https://img.shields.io/packagist/v/authorizenet/authorizenet.svg)](https://packagist.org/packages/authorizenet/authorizenet)


## License
Proprietary, see the provided `license.md`.


## Requirements
- PHP 5.6+
- cURL PHP Extension
- JSON PHP Extension
- SimpleXML PHP Extension
- An Authorize.Net Merchant account or Sandbox account (You can get a 
	free sandbox account at http://developer.authorize.net/hello_world/sandbox/).
- TLS 1.2 capable versions of libcurl and OpenSSL (or its equivalent)

### TLS 1.2
The Authorize.Net APIs only support connections using TLS 1.2. This PHP SDK communicates with the Authorize.Net API using `libcurl` and `OpenSSL` (or equivalent crypto library). It's important to make sure you have new enough versions of these components to support TLS 1.2. Additionally, it's very important to keep these components up to date going forward to mitigate the risk of any security flaws that may be discovered in these libraries.

To test whether your current installation is capable of communicating to our servers using TLS 1.2, run the following PHP code and examine the output for the TLS version:
```php
<?php
    $ch = curl_init('https://apitest.authorize.net/xml/v1/request.api');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $data = curl_exec($ch);
    curl_close($ch);
```

	
## Autoloading
We recommend using [`Composer`](http://getcomposer.org) *(note we never recommend you
override the new secure-http default setting)*. Don't forget to require its autoloader
in your script or bootstrap file:
```php
require 'vendor/autoload.php';
```
*Update your composer.json file as per the example below and then run
`composer update`.*

```json
{
  "require": {
  "php": ">=5.6",
  "ext-curl": "*",
  "authorizenet/authorizenet": "~1.9"
  }
}
```

Alternatively, we provide a custom `SPL` autoloader for you to reference from within your PHP file:
```php
require 'path/to/anet_php_sdk/autoload.php';
```
This autoloader still requires the `vendor` directory and all of its dependencies to exist.
However, this is a possible solution for cases where composer can't be run on a given system.
You can run composer locally or on another system to build the directory, then copy the
`vendor` directory to the desired system.


## Authentication
To authenticate with the Authorize.Net API you will need to retrieve your API Login ID and Transaction Key from the [Merchant Interface](https://account.authorize.net/).  You can find these details in the Settings section.
If you don't currently have a production Authorize.Net account and need a sandbox account for testing, you can easily sign up for one [here](https://developer.authorize.net/sandbox/).

Once you have your keys simply load them into the appropriate variables in your code, as per the below sample code dealing with the authentication part of the flow.

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

You should never include your Login ID and Transaction Key directly in a PHP file that's in a publically accessible portion of your website. A better practice would be to define these in a constants file, and then reference those constants in the appropriate place in your code.


## SDK Usage Examples and Sample Code
Apart from this README, we have comprehensive sample code for all common uses of our API:
- [Github Sample Code Repositories](https://github.com/AuthorizeNet/sample-code-php)

Additionally, you can find details and examples of using the SDK in our API Reference Guide:
- [Developer Center API Reference](http://developer.authorize.net/api/reference/index.html)


### Setting Production Environment  
To change from the sandbox environment to the production environment, replace the environment constant in the execute method.  For example, in the method above:
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
