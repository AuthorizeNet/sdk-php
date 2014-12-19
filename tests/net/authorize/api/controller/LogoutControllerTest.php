<?php
namespace net\authorize\api\controller\test;

use net\authorize\api\contract\v1\LogoutRequest;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use \net\authorize\api\controller\LogoutController;

require_once __DIR__ . '/../../../../../autoload.php';
//include if tests/bootstrap.php is not loaded automatically
//require_once __DIR__ . '/../../../../bootstrap.php';

class LogoutControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testLogout()
    {
        $this->markTestSkipped('Ignoring for Travis. Will fix after release.'); //TODO

        $name =           (defined('AUTHORIZENET_API_LOGIN_ID')    && ''!=AUTHORIZENET_API_LOGIN_ID)    ? AUTHORIZENET_API_LOGIN_ID    : getenv("api_login_id");
        $transactionKey = (defined('AUTHORIZENET_TRANSACTION_KEY') && ''!=AUTHORIZENET_TRANSACTION_KEY) ? AUTHORIZENET_TRANSACTION_KEY : getenv("transaction_key");
        $merchantAuthentication = new MerchantAuthenticationType();
        $merchantAuthentication->setName($name);
        $merchantAuthentication->setTransactionKey($transactionKey);

        $refId = 'ref' . time();

        $request = new LogoutRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId( $refId);

        $controller = new LogoutController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
        // Handle the response.
        $this->assertNotNull($response, "null response");
        $this->assertNotNull($response->getMessages());

        $this->assertEquals("Ok", $response->getMessages()->getResultCode());
        $this->assertEquals($response->getRefId(), $refId);
        $this->assertTrue(0 < count($response->getMessages()));
        foreach ($response->getMessages() as $message)
        {
            $this->assertEquals("I00001", $message->getCode());
            $this->assertEquals("Successful.", $response->getText());
        }
    }
}
