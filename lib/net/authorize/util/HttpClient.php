<?php
namespace net\authorize\util;

/**
 * A class to send a request to the XML API.
 *
 * @package    AuthorizeNet
 * @subpackage net\authorize\util
 */
class HttpClient
{
    private $_Url = "";

    public $VERIFY_PEER = true; // attempt trust validation of SSL certificates when establishing secure connections.
    private $_log_file = false;

    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        $this->_log_file = (defined('AUTHORIZENET_LOG_FILE') ? AUTHORIZENET_LOG_FILE : false);
        date_default_timezone_set('UTC');
    }

    /**
     * Set a log file.
     *
     * @param string $endPoint end point to hit from  \net\authorize\api\constants\ANetEnvironment
     */
    public function setPostUrl( $endPoint = \net\authorize\api\constants\ANetEnvironment::CUSTOM)
    {
        $this->_Url = sprintf( "%s/xml/v1/request.api", $endPoint);
    }

    /**
     * @return string
     */
    public function _getPostUrl()
    {
        //return (self::URL);
        return ($this->_Url);
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
     * Posts the request to AuthorizeNet endpoint using Curl & returns response.
     *
     * @param string $xmlRequest
     * @return string $xmlResponse The response.
     */
    public function _sendRequest($xmlRequest)
    {
        $xmlResponse = "";

        $post_url = $this->_getPostUrl();
        $curl_request = curl_init($post_url);
        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($curl_request, CURLOPT_HEADER, 0);
        curl_setopt($curl_request, CURLOPT_TIMEOUT, 45);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYHOST, 2);

        file_put_contents($this->_log_file, sprintf("\n%s: Url: %s", $this->now(), $post_url), FILE_APPEND);
        // Do not log requests that could contain CC info.
        file_put_contents($this->_log_file, sprintf("\n%s:Request to AnetApi: \n%s", $this->now(), $xmlRequest), FILE_APPEND);

        if ($this->VERIFY_PEER) {
            curl_setopt($curl_request, CURLOPT_CAINFO, dirname(dirname(__FILE__)) . '/../../ssl/cert.pem');
        } else {
            if ($this->_log_file) {
                file_put_contents($this->_log_file, "\nInvalid SSL option for the request", FILE_APPEND);
            }
            return false;
        }

        if (preg_match('/xml/',$post_url)) {
            curl_setopt($curl_request, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
            file_put_contents($this->_log_file, "\nSending 'XML' Request type", FILE_APPEND);
        }

        try
        {
            file_put_contents($this->_log_file, sprintf("\n%s:Sending http request via Curl", $this->now()), FILE_APPEND);
            $xmlResponse = curl_exec($curl_request);
            file_put_contents($this->_log_file, sprintf("\n%s:Response from AnetApi: \n%s\n", $this->now(), $xmlResponse), FILE_APPEND);
        } catch (\Exception $ex)
        {
            $errorMessage = sprintf("\n%s:Error making http request via curl: Code:'%s', Message:'%s', Trace:'%s', File:'%s':'%s'",
                $this->now(), $ex->getCode(), $ex->getMessage(), $ex->getTraceAsString(), $ex->getFile(), $ex->getLine() );
            file_put_contents($this->_log_file, $errorMessage, FILE_APPEND);
        }
        if ($this->_log_file) {
            if ($curl_error = curl_error($curl_request)) {
                file_put_contents($this->_log_file, sprintf("\n%s:CURL ERROR: %s", $this->now(), $curl_error), FILE_APPEND);
            }

        }
        curl_close($curl_request);

        return $xmlResponse;
    }

    private function now()
    {
        return date( DATE_RFC2822);
    }
}
