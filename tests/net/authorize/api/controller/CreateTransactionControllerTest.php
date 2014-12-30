<?php
namespace net\authorize\api\controller\test;

use net\authorize\api\contract\v1 AS apiContract;
use net\authorize\api\controller AS apiController;

require_once __DIR__ . '/ApiCoreTestBase.php';

class CreateTransactionControllerTest extends ApiCoreTestBase
{
/*
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
        self::displayMessages( $response);
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
*/

    public function testCreateTransactionPayPal()
    {
        $merchantAuthentication = new apiContract\MerchantAuthenticationType();
        $merchantAuthentication->setName(self::$LoginName);
        $merchantAuthentication->setTransactionKey(self::$TransactionKey);

        $paymentType = new apiContract\PaymentType();
        $paymentType->setPayPal($this->payPalOne);

        //create a transaction
        $transactionRequestType = new apiContract\TransactionRequestType();
        $transactionRequestType->setTransactionType( "authOnlyTransaction"); // TODO Change to Enum
        $transactionRequestType->setAmount( $this->setValidAmount( $this->counter));
        $transactionRequestType->setPayment( $paymentType);

        $request = new apiContract\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setTransactionRequest( $transactionRequestType);

        $controller = new apiController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( self::$TestEnvironment);

        // Handle the response.
        $this->assertNotNull($response, "null response");
        $this->assertNotNull($response->getMessages());

        self::displayMessages( $response);
        if ( "Ok" != $response->getMessages()->getResultCode())
        {
            $this->displayTransactionMessages( $response);
            $this->assertTrue( false, "Should not reach here.");
        }
        $this->assertEquals("Ok", $response->getMessages()->getResultCode());

        $this->assertEquals("Ok", $response->getMessages()->getResultCode());
        $this->assertTrue(0 < count($response->getMessages()));
        foreach ($response->getMessages() as $message)
        {
            $this->assertEquals("I00001", $message->getCode());
            $this->assertEquals("Successful.", $response->getText());
        }
    }

    function displayTransactionMessages( apiContract\CreateTransactionResponse $response)
    {
        if ( null != $response)
        {
            $logMessage = sprintf("\n%s: Displaying Transaction Response.", \net\authorize\util\Helpers::now());
            echo $logMessage; file_put_contents(self::$log_file, $logMessage, FILE_APPEND);

            if ( null != $response->getTransactionResponse())
            {
                $logMessage = sprintf("\n%s: Transaction Response Code: '%s'.", \net\authorize\util\Helpers::now(), $response->getTransactionResponse()->getResponseCode());
                echo $logMessage; file_put_contents(self::$log_file, $logMessage, FILE_APPEND);

                $allMessages = $response->getTransactionResponse()->getMessages();
                $allErrors = $response->getTransactionResponse()->getErrors();
                $errorCount = 0;
                if ( null != $allErrors)
                {
                    foreach ( $allErrors as $error)
                    {
                        $errorCount++;
                        $logMessage = sprintf("\n%s: %d - Error: Code:'%s', Text:'%s'", \net\authorize\util\Helpers::now(), $errorCount, $error->getErrorCode(), $error->getErrorText());
                        echo $logMessage; file_put_contents(self::$log_file, $logMessage, FILE_APPEND);
                    }
                }
                $messageCount = 0;
                if ( null != $allMessages)
                {
                    foreach ( $allMessages as $message)
                    {
                        $messageCount++;
                        //$logMessage = sprintf("\n%s: %d - Message: Code:'%s', Description:'%s'", \net\authorize\util\Helpers::now(), $errorCount, $message->getCode(), $message->getDescription());
                        $logMessage = sprintf("\n%s: %d - Message: ", \net\authorize\util\Helpers::now(), $messageCount);
                        echo $logMessage; file_put_contents(self::$log_file, $logMessage, FILE_APPEND);
                    }
                }
                $logMessage = sprintf("\n%s: Transaction Response, Errors: '%d', Messages: '%d'.", \net\authorize\util\Helpers::now(), $errorCount, $messageCount);
                echo $logMessage; file_put_contents(self::$log_file, $logMessage, FILE_APPEND);
            }
        }
    }
}
