<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateCustomerPaymentProfileResponse
 */
class UpdateCustomerPaymentProfileResponse extends ANetApiResponseType
{

    /**
     * @property string $validationDirectResponse
     */
    private $validationDirectResponse = null;

    /**
     * Gets as validationDirectResponse
     *
     * @return string
     */
    public function getValidationDirectResponse()
    {
        return $this->validationDirectResponse;
    }

    /**
     * Sets a new validationDirectResponse
     *
     * @param string $validationDirectResponse
     * @return self
     */
    public function setValidationDirectResponse($validationDirectResponse)
    {
        $this->validationDirectResponse = $validationDirectResponse;
        return $this;
    }


}

