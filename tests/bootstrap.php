<?php
/**
 * Bootstraps the AuthorizeNet PHP SDK test suite
 */

define( "AUTHORIZENET_API_LOGIN_ID", $_ENV["api_login_id"]); //TODO
define( "AUTHORIZENET_TRANSACTION_KEY", $_ENV["transaction_key"]); //TODO
define( "AUTHORIZENET_LOG_FILE",  "./authorize-net.log");

// Append to log file
date_default_timezone_set('UTC'); //necessary for the following date to set timezone
file_put_contents(AUTHORIZENET_LOG_FILE, sprintf("Logging Started: %s\n", date( DATE_RFC2822)), FILE_APPEND);

// validate existence of available extensions
if (!function_exists('simplexml_load_file'))
{
    $errorMessage = 'The AuthorizeNet SDK requires the SimpleXML PHP extension.';
    throw new RuntimeException( $errorMessage );
}

if (!function_exists('curl_init'))
{
    $errorMessage = 'The AuthorizeNet SDK requires the cURL PHP extension.';
    throw new RuntimeException( $errorMessage );
}

// validate existence of properties
// properties file take precedence over environment
if (!defined('AUTHORIZENET_API_LOGIN_ID') ||
    !defined('AUTHORIZENET_TRANSACTION_KEY'))
{
    $errorMessage = "Undefined constants for merchant authentication";
    throw new RuntimeException( $errorMessage );
}

if (AUTHORIZENET_API_LOGIN_ID == "")
{
    AUTHORIZENET_API_LOGIN_ID == $_ENV["api_login_id"]; //TODO
    if (AUTHORIZENET_API_LOGIN_ID == "")
    {
        $errorMessage = "Property 'AUTHORIZENET_API_LOGIN_ID' not found. Define the property value or set the environment 'AUTHORIZENET_API_LOGIN_ID'";
        throw new RuntimeException( $errorMessage );
    }
}

if (AUTHORIZENET_TRANSACTION_KEY == "")
{
    AUTHORIZENET_TRANSACTION_KEY == $_ENV["transaction_key"]; //TODO
    if (AUTHORIZENET_TRANSACTION_KEY == "") {
        $errorMessage = "Property 'AUTHORIZENET_TRANSACTION_KEY' not found. Define the property value or set the environment 'AUTHORIZENET_TRANSACTION_KEY'";
        throw new RuntimeException( $errorMessage );
    }
}

ini_set('error_reporting', E_ALL);

$loader = require '../vendor/autoload.php';
if (!isset($loader))
{
    $errorMessage = 'vendor/autoload.php could not be found.';
    throw new RuntimeException( $errorMessage );
}
