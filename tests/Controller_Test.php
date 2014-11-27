<?php

/*
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\handler\HandlerRegistryInterface;
use Goetas\Xsd\XsdToPhp\Jms\Handler\BaseTypesHandler;
use Goetas\Xsd\XsdToPhp\Jms\Handler\XmlSchemaDateHandler;

use \net\authorize\util\HttpClient;
*/
use \net\authorize\api\controller\base\ApiOperationBase;

require_once __DIR__ . '/../autoload.php';
require_once "../phpunit_config.php";


class Controller_Test extends PHPUnit_Framework_TestCase
{
    public function testARBGetSubscriptionList()
    {
//        $test = net\authorize\api\contract\v1\AccountTypeEnum::AMERICAN_EXPRESS;
        $name = '4YJmeW7V77us' ; //net\authorize\api\contract\v1\NameType::create("loginId");
        $transactionKey = '4qHK9u63F753be4Z';
        $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
        $merchantAuthentication->setName($name);
        $merchantAuthentication->setTransactionKey($transactionKey);
        //$merchantAuthentication->setMobileDeviceId()

        $refId = 'ref' . time();//net\authorize\api\contract\v1\RefIdType::create("ref" . time());
        //$refId = RefIdType.create("ref" . time());

        $sorting = new net\authorize\api\contract\v1\ARBGetSubscriptionListSortingType();
        //$sorting->setOrderBy(net\authorize\api\contract\v1\ARBGetSubscriptionListOrderFieldEnum::first_name());
        $sorting->setOrderBy('firstName');
        $sorting->setOrderDescending(false);

        $paging = new net\authorize\api\contract\v1\PagingType();
//        $paging->setLimit(net\authorize\api\contract\v1\LimitType::create(10));
//        $paging->setOffset(net\authorize\api\contract\v1\OffsetType::create(1));
        $paging->setLimit(10);
        $paging->setOffset(1);

        $request = new net\authorize\api\contract\v1\ARBGetSubscriptionListRequest();
        $request->setSearchType('subscriptionActive');
        //$request->setSearchType(net\authorize\api\contract\v1\ARBGetSubscriptionListSearchTypeEnum::subscription_active());
        $request->setRefId( $refId);
        $request->setSorting($sorting);
        $request->setPaging($paging);

        $request->setMerchantAuthentication($merchantAuthentication);

        $controller = new ApiOperationBase($request, 'net\authorize\api\contract\v1\ARBGetSubscriptionListResponse');
        $response = $controller->executeWithApiResponse();
        // Handle the response.
        $this->assertNotNull($response, "null response");
        $this->assertNotNull($response->getMessages());

        $this->assertEquals("Ok", $response->getMessages()->getResultCode());
        $this->assertEquals($response->getRefId(), $refId);
        $this->assertTrue(0 < count($response->getMessages()));//   getMessageCode());
        foreach ($response->getMessages() as $message)
        {
            $this->assertEquals("I00001", $message->getCode());
            $this->assertEquals("Successful.", $response->getText());
       }
    }
}