<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateCustomerShippingAddressRequest
 */
class UpdateCustomerShippingAddressRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType $address
     */
    private $address = null;

    /**
     * @property boolean $defaultShippingAddress
     */
    private $defaultShippingAddress = null;

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
     * Gets as address
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressExType
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressExType $address
     * @return self
     */
    public function setAddress(\net\authorize\api\contract\v1\CustomerAddressExType $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Gets as defaultShippingAddress
     *
     * @return boolean
     */
    public function getDefaultShippingAddress()
    {
        return $this->defaultShippingAddress;
    }

    /**
     * Sets a new defaultShippingAddress
     *
     * @param boolean $defaultShippingAddress
     * @return self
     */
    public function setDefaultShippingAddress($defaultShippingAddress)
    {
        $this->defaultShippingAddress = $defaultShippingAddress;
        return $this;
    }


}

