<?php
/**
 * Sends requests to the Authorize.Net gateways.
 *
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetRequest
 */
abstract class AuthorizeNetRequest
{
    
    protected $_api_login;
    protected $_transaction_key;
    protected $_post_string; 
    public $VERIFY_PEER = true; // attempt trust validation of SSL certificates when establishing secure connections.
    protected $_sandbox = true;
    protected $_log_file = false;
    
    /**
     * Set the _post_string
     */
    abstract protected function _setPostString();
    
    /**
     * Handle the response string
     */
    abstract protected function _handleResponse($string);
    
    /**
     * Get the post url. We need this because until 5.3 you
     * you could not access child constants in a parent class.
     */
    abstract protected function _getPostUrl();
    
    /**
     * Constructor.
     *
     * @param string $api_login_id       The Merchant's API Login ID.
     * @param string $transaction_key The Merchant's Transaction Key.
     */
    public function __construct($api_login_id = false, $transaction_key = false)
    {
        $this->_api_login = ($api_login_id ? $api_login_id : (defined('AUTHORIZENET_API_LOGIN_ID') ? AUTHORIZENET_API_LOGIN_ID : ""));
        $this->_transaction_key = ($transaction_key ? $transaction_key : (defined('AUTHORIZENET_TRANSACTION_KEY') ? AUTHORIZENET_TRANSACTION_KEY : ""));
        $this->_sandbox = (defined('AUTHORIZENET_SANDBOX') ? AUTHORIZENET_SANDBOX : true);
        $this->_log_file = (defined('AUTHORIZENET_LOG_FILE') ? AUTHORIZENET_LOG_FILE : false);
    }
    
    /**
     * Alter the gateway url.
     *
     * @param bool $bool Use the Sandbox.
     */
    public function setSandbox($bool)
    {
        $this->_sandbox = $bool;
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
     * Return the post string.
     *
     * @return string
     */
    public function getPostString()
    {
        return $this->_post_string;
    }

    /**
     * Posts the request to AuthorizeNet & returns response using streams
     *
     * @return AuthorizeNetARB_Response The response.
     */
    protected function _sendStreamRequest()
    {
        $this->_setPostString();
        $content_type = preg_match('/xml/', $this->_getPostUrl()) ? 'text/xml' : 'application/x-www-form-urlencoded';
        $content_length = strlen($this->_post_string);
        $context = stream_context_create(array(
            'http' => array(
                'header'        => "Content-Type: {$content_type}\r\nContentLength: {$content_length}\r\n",
                'timeout'       => 45.0,
                'ignore_errors' => true,
                'method'        => 'POST',
                'content'       => $this->_post_string,
            ),
        ));
        $response = file_get_contents($this->_getPostUrl(), false, $context);

        return $this->_handleResponse($response);
    }
    
    /**
     * Posts the request to AuthorizeNet & returns response.
     *
     * @return AuthorizeNetARB_Response The response.
     */
    protected function _sendRequest()
    {
        if (!defined('CURLOPT_POSTFIELDS')) {
            return $this->_sendStreamRequest();
        }

        $this->_setPostString();
        $post_url = $this->_getPostUrl();
        $curl_request = curl_init($post_url);
        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $this->_post_string);
        curl_setopt($curl_request, CURLOPT_HEADER, 0);
        curl_setopt($curl_request, CURLOPT_TIMEOUT, 45);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYHOST, 2);

        if ($this->VERIFY_PEER) {
            curl_setopt($curl_request, CURLOPT_CAINFO, dirname(dirname(__FILE__)) . '/ssl/cert.pem');
        } else {
			if ($this->_log_file) {
				file_put_contents($this->_log_file, "----Request----\nInvalid SSL option\n", FILE_APPEND);
			}
			return false;
        }
        
        if (preg_match('/xml/',$post_url)) {
            curl_setopt($curl_request, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        }
        
        $response = curl_exec($curl_request);
        
        if ($this->_log_file) {
        
            if ($curl_error = curl_error($curl_request)) {
                file_put_contents($this->_log_file, "----CURL ERROR----\n$curl_error\n\n", FILE_APPEND);
            }
            // Do not log requests that could contain CC info.
             file_put_contents($this->_log_file, "----Request----\n{$this->_post_string}\n", FILE_APPEND);
            
            file_put_contents($this->_log_file, "----Response----\n$response\n\n", FILE_APPEND);
        }
        curl_close($curl_request);
        
        return $this->_handleResponse($response);
    }

}
