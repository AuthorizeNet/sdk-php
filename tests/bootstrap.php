<?php
/**
 * Bootstraps the AuthorizeNet PHP SDK test suite
 */

// Clear logfile
file_put_contents(AUTHORIZENET_LOG_FILE, "");

if (!function_exists('simplexml_load_file')) {
    throw new RuntimeException(
        'The AuthorizeNet SDK requires the SimpleXML PHP extension.'
    );
}

if (!function_exists('curl_init')) {
    throw new RuntimeException(
        'The AuthorizeNet SDK requires the cURL PHP extension.'
    );
}

if (AUTHORIZENET_API_LOGIN_ID == "") {
    throw new RuntimeException(
        'Copy /phpunit.xml.dist to /phpunit.xml and enter your merchant credentials'
        . ' before running the tests.'
    );
}

ini_set('error_reporting', E_ALL);

$loader = require 'vendor/autoload.php';
if (!isset($loader)) {
    throw new RuntimeException('vendor/autoload.php could not be found.');
}
