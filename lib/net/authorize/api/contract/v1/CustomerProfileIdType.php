<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfileIdType
 *
 *
 * XSD Type: customerProfileIdType
 */
class CustomerProfileIdType
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
     * @property string $customerAddressId
     */
    private $customerAddressId = null;

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
     * Gets as customerAddressId
     *
     * @return string
     */
    public function getCustomerAddressId()
    {
        return $this->customerAddressId;
    }

    /**
     * Sets a new customerAddressId
     *
     * @param string $customerAddressId
     * @return self
     */
    public function setCustomerAddressId($customerAddressId)
    {
        $this->customerAddressId = $customerAddressId;
        return $this;
    }


}

