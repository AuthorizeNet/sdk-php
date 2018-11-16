<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerPaymentProfileNonceRequest
 */
class GetCustomerPaymentProfileNonceRequest extends ANetApiRequestType
{

    /**
     * @property string $connectedAccessToken
     */
    private $connectedAccessToken = null;

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

    /**
     * Gets as connectedAccessToken
     *
     * @return string
     */
    public function getConnectedAccessToken()
    {
        return $this->connectedAccessToken;
    }

    /**
     * Sets a new connectedAccessToken
     *
     * @param string $connectedAccessToken
     * @return self
     */
    public function setConnectedAccessToken($connectedAccessToken)
    {
        $this->connectedAccessToken = $connectedAccessToken;
        return $this;
    }

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


}

