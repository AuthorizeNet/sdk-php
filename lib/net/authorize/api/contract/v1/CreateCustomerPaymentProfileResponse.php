<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateCustomerPaymentProfileResponse
 */
class CreateCustomerPaymentProfileResponse extends ANetApiResponseType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

    /**
     * @property string $validationDirectResponse
     */
    private $validationDirectResponse = null;

    /**
     * Gets as customerProfileId
     *
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * Sets a new customerProfileId
     *
     * @param string $customerProfileId
     * @return self
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

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

