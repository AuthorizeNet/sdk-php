<?php
/**
 * Bootstraps the AuthorizeNet PHP SDK test suite
 */

if (!defined('AUTHORIZENET_API_LOGIN_ID'))
{
    define( "AUTHORIZENET_API_LOGIN_ID", ( ( null == getenv("api_login_id")) ? getenv("api_login_id") : ""));
}
if (!defined('AUTHORIZENET_LOG_FILE'))
{
    define( "AUTHORIZENET_TRANSACTION_KEY", ( ( null == getenv("transaction_key")) ? getenv("transaction_key") : ""));
}
if (!defined('AUTHORIZENET_LOG_FILE'))
{
    define( "AUTHORIZENET_LOG_FILE",  "./authorize-net.log");
}

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

if (null == AUTHORIZENET_API_LOGIN_ID || null == AUTHORIZENET_LOG_FILE)
{
    $errorMessage = "Property 'AUTHORIZENET_API_LOGIN_ID' or 'AUTHORIZENET_TRANSACTION_KEY' not found.";
    throw new RuntimeException( $errorMessage );
}

if (AUTHORIZENET_API_LOGIN_ID == "")
{
    $errorMessage = "Property 'AUTHORIZENET_API_LOGIN_ID' not found. Define the property value or set the environment 'AUTHORIZENET_API_LOGIN_ID'";
    throw new RuntimeException( $errorMessage );
}

if (AUTHORIZENET_TRANSACTION_KEY == "")
{
    $errorMessage = "Property 'AUTHORIZENET_TRANSACTION_KEY' not found. Define the property value or set the environment 'AUTHORIZENET_TRANSACTION_KEY'";
    throw new RuntimeException( $errorMessage );
}

ini_set('error_reporting', E_ALL);

$loader = require '../vendor/autoload.php';
if (!isset($loader))
{
    $errorMessage = 'vendor/autoload.php could not be found.';
    throw new RuntimeException( $errorMessage );
}
