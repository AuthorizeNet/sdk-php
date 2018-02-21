<?php
namespace net\authorize\api\controller;

use net\authorize\api\contract\v1\AnetApiRequestType;
use net\authorize\api\controller\base\ApiOperationBase;

class CreateCustomerShippingAddressController extends ApiOperationBase
{
    public function __construct(AnetApiRequestType $request, Log $logger = null)
    {
        $responseType = 'net\authorize\api\contract\v1\CreateCustomerShippingAddressResponse';
        parent::__construct($request, $responseType, $logger);
    }

    protected function validateRequest()
    {
        //validate required fields of $this->apiRequest->

        //validate non-required fields of $this->apiRequest->
    }
}
