<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerAddressExType
 *
 *
 * XSD Type: customerAddressExType
 */
class CustomerAddressExType extends CustomerAddressType
{

    /**
     * @property string $customerAddressId
     */
    private $customerAddressId = null;

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

