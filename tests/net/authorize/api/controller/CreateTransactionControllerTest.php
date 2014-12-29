<?php
namespace net\authorize\api\controller\test;

use net\authorize\api\contract\v1 AS apiContract;
use net\authorize\api\controller AS apiController;

require_once __DIR__ . '/ApiCoreTestBase.php';

class CreateTransactionControllerTest extends ApiCoreTestBase
{
    public function testCreateTransactionCreditCard()
    {
        $merchantAuthentication = new apiContract\MerchantAuthenticationType();
        $merchantAuthentication->setName(self::$LoginName);
        $merchantAuthentication->setTransactionKey(self::$TransactionKey);

        //create a transaction
        $transactionRequestType = new apiContract\TransactionRequestType();
        $transactionRequestType->setTransactionType( "authCaptureTransaction"); // TODO Change to Enum
        $transactionRequestType->setAmount( $this->setValidAmount( $this->counter));
        $transactionRequestType->setPayment( $this->paymentOne);
        $transactionRequestType->setOrder( $this->orderType);
        $transactionRequestType->setCustomer( $this->customerDataOne);
        $transactionRequestType->setBillTo( $this->customerAddressOne);

        $request = new apiContract\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId( $this->refId);
        $request->setTransactionRequest( $transactionRequestType);

        $controller = new apiController\CreateTransactionController($request);
        $controller->execute( self::$TestEnvironment);
        $response = $controller->getApiResponse();

        // Handle and validate the response
        $this->assertNotNull($response, "null response");
        $this->assertNotNull($response->getMessages());
        file_put_contents(self::$log_file, sprintf("\n%s: Controller Response ResultCode: '%s'.", \net\authorize\util\Helpers::now() ,$response->getMessages()->getResultCode()), FILE_APPEND);
        $this->assertEquals("Ok", $response->getMessages()->getResultCode());
        $this->assertEquals( $this->refId, $response->getRefId());
        $this->assertTrue(0 < count($response->getMessages()));
        foreach ($response->getMessages() as $message)
        {
            $this->assertEquals("I00001", $message->getCode());
            $this->assertEquals("Successful.", $response->getText());
        }
    }
/*
    public function testCreateTransactionPayPal()
    {
        $this->markTestSkipped('Ignoring for Travis. Will fix after release.'); //TODO

        $name =           (defined('AUTHORIZENET_API_LOGIN_ID')    && ''!=AUTHORIZENET_API_LOGIN_ID)    ? AUTHORIZENET_API_LOGIN_ID    : getenv("api_login_id");
        $transactionKey = (defined('AUTHORIZENET_TRANSACTION_KEY') && ''!=AUTHORIZENET_TRANSACTION_KEY) ? AUTHORIZENET_TRANSACTION_KEY : getenv("transaction_key");

        $name ="9q2yWeA3J3Q";
        $transactionKey="7KTb8aThMJ35y879";
        if (!defined('AUTHORIZENET_LOG_FILE'))
        {
            define( "AUTHORIZENET_LOG_FILE",  "./authorize-net.log");
        }

        $merchantAuthentication = new MerchantAuthenticationType();
        $merchantAuthentication->setName($name);
        $merchantAuthentication->setTransactionKey($transactionKey);

        $paymentType = new PaymentType();
        $paymentType->setPayPal($this->payPalOne);

        //create a transaction
        $transactionRequestType = new TransactionRequestType();
        $transactionRequestType->setTransactionType( "authOnlyTransaction"); // TODO Change to Enum
        $transactionRequestType->setAmount( $this->setValidAmount( $this->counter));
        $transactionRequestType->setPayment( $paymentType);

        $request = new CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setTransactionRequest( $transactionRequestType);

        $controller = new CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::CUSTOM);

        // Handle the response.
        $this->assertNotNull($response, "null response");
        $this->assertNotNull($response->getMessages());

        $this->assertEquals("Ok", $response->getMessages()->getResultCode());
        $this->assertTrue(0 < count($response->getMessages()));
        foreach ($response->getMessages() as $message)
        {
            $this->assertEquals("I00001", $message->getCode());
            $this->assertEquals("Successful.", $response->getText());
        }
    }
*/
}
