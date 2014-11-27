<?php
namespace net\authorize\util;

/**
 * Easily interact with the Authorize.Net XML API.
 *
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetARB
 * @link       http://www.authorize.net/support/ARB_guide.pdf ARB Guide
 */

/**
 * A class to send a request to the XML API.
 *
 * @package    AuthorizeNet
 * @subpackage net\authorize\util
 */
class HttpClient
{
    const URL = "https://apitest.authorize.net/xml/v1/request.api";


    public $VERIFY_PEER = true; // attempt trust validation of SSL certificates when establishing secure connections.
    private $_log_file = false;

    /**
     * Constructor.
     *
     * @param string $api_login_id       The Merchant's API Login ID.
     * @param string $transaction_key The Merchant's Transaction Key.
     */
    public function __construct()//$api_login_id = false, $transaction_key = false)
    {
        //$this->_api_login = ($api_login_id ? $api_login_id : (defined('AUTHORIZENET_API_LOGIN_ID') ? AUTHORIZENET_API_LOGIN_ID : ""));
        //$this->_transaction_key = ($transaction_key ? $transaction_key : (defined('AUTHORIZENET_TRANSACTION_KEY') ? AUTHORIZENET_TRANSACTION_KEY : ""));
        //$this->_sandbox = (defined('AUTHORIZENET_SANDBOX') ? AUTHORIZENET_SANDBOX : true);
        //$this->_log_file = (defined('AUTHORIZENET_LOG_FILE') ? AUTHORIZENET_LOG_FILE : false);
        $this->_log_file = AUTHORIZENET_LOG_FILE;
    }

    /*
        public function cancelSubscription($subscriptionId)
        {
            $this->_request_type = "CancelSubscriptionRequest";
            $this->_request_payload .= "<subscriptionId>$subscriptionId</subscriptionId>";
            return $this->_sendRequest();
        }
    */

    /**
     * @return string
     */
    public function _getPostUrl()
    {
        return (self::URL);
    }

    /**
     * Set a log file.
     *
     * @param string $filepath Path to log file.
     */
    public function setLogFile($filepath)
    {
        $this->_log_file = $filepath;
    }

    /**
     * Posts the request to AuthorizeNet & returns response.
     *
     * @return $xmlResponse The response.
     */
    public function _sendRequest($xmlRequest)
    {
        $post_url = $this->_getPostUrl();
        $curl_request = curl_init($post_url);
        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($curl_request, CURLOPT_HEADER, 0);
        curl_setopt($curl_request, CURLOPT_TIMEOUT, 45);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYHOST, 2);

        file_put_contents($this->_log_file, sprintf("Url: %s", $post_url), FILE_APPEND);
        // Do not log requests that could contain CC info.
        file_put_contents($this->_log_file, sprintf("Request: %s", $xmlRequest), FILE_APPEND);

        if ($this->VERIFY_PEER) {
            curl_setopt($curl_request, CURLOPT_CAINFO, dirname(dirname(__FILE__)) . '../../../ssl/cert.pem');//..\..\..\ssl\cert.pem
        } else {
            if ($this->_log_file) {
                file_put_contents($this->_log_file, "----Request----\nInvalid SSL option\n", FILE_APPEND);
            }
            return false;
        }

        if (preg_match('/xml/',$post_url)) {
            curl_setopt($curl_request, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
            file_put_contents($this->_log_file, "Sending XML Request type", FILE_APPEND);
        }

        $xmlResponse = curl_exec($curl_request);
        file_put_contents($this->_log_file, sprintf("Response: %s", $xmlResponse), FILE_APPEND);

        if ($this->_log_file) {

            if ($curl_error = curl_error($curl_request)) {
                file_put_contents($this->_log_file, "----CURL ERROR----\n$curl_error\n\n", FILE_APPEND);
            }

        }
        curl_close($curl_request);

        //return $this->_handleResponse($response);
        return $xmlResponse;
    }
}