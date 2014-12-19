<?php
use \net\authorize\api\controller\base\ApiOperationBase;

require_once __DIR__ . '/../autoload.php';
//include if tests/bootstrap.php is not loaded automatically
//require_once __DIR__ . '/bootstrap.php';

class Controller_Test extends PHPUnit_Framework_TestCase
{
    public function testARBGetSubscriptionList()
    {
        $this->markTestSkipped('Ignoring for Travis. Will fix after release.'); //TODO

        $name =           (defined('AUTHORIZENET_API_LOGIN_ID')    && ''!=AUTHORIZENET_API_LOGIN_ID)    ? AUTHORIZENET_API_LOGIN_ID    : getenv("api_login_id");
        $transactionKey = (defined('AUTHORIZENET_TRANSACTION_KEY') && ''!=AUTHORIZENET_TRANSACTION_KEY) ? AUTHORIZENET_TRANSACTION_KEY : getenv("transaction_key");

        $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
        $merchantAuthentication->setName($name);
        $merchantAuthentication->setTransactionKey($transactionKey);
        //$merchantAuthentication->setMobileDeviceId()

        $refId = 'ref' . time();

        $sorting = new net\authorize\api\contract\v1\ARBGetSubscriptionListSortingType();
        $sorting->setOrderBy('firstName');
        $sorting->setOrderDescending(false);

        $paging = new net\authorize\api\contract\v1\PagingType();
        $paging->setLimit(10);
        $paging->setOffset(1);

        $request = new net\authorize\api\contract\v1\ARBGetSubscriptionListRequest();
        $request->setSearchType('subscriptionActive');
        $request->setRefId( $refId);
        $request->setSorting($sorting);
        $request->setPaging($paging);
        $request->setMerchantAuthentication($merchantAuthentication);

        //$controller = new ApiOperationBase($request, 'net\authorize\api\contract\v1\ARBGetSubscriptionListResponse');
        $controller = new TestController( $request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

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

class TestController extends ApiOperationBase
{
    public function __construct(\net\authorize\api\contract\v1\AnetApiRequestType $request)
    {
        $responseType = 'net\authorize\api\contract\v1\ARBGetSubscriptionListResponse';
        parent::__construct($request, $responseType);
    }

    protected function validateRequest()
    {
        //empty
    }
}
