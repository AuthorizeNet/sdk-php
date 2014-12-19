<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerShippingAddressResponse
 */
class GetCustomerShippingAddressResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType $address
     */
    private $address = null;

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


}

