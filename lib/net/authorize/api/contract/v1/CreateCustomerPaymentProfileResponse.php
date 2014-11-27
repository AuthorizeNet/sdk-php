<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateCustomerPaymentProfileResponse
 */
class CreateCustomerPaymentProfileResponse extends ANetApiResponseType
{

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

    /**
     * @property string $validationDirectResponse
     */
    private $validationDirectResponse = null;

    /**
     * Gets as customerPaymentProfileId
     *
     * @return string
     */
    public function getCustomerPaymentProfileId()
    {
        return $this->customerPaymentProfileId;
    }

    /**
     * Sets a new customerPaymentProfileId
     *
     * @param string $customerPaymentProfileId
     * @return self
     */
    public function setCustomerPaymentProfileId($customerPaymentProfileId)
    {
        $this->customerPaymentProfileId = $customerPaymentProfileId;
        return $this;
    }

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

