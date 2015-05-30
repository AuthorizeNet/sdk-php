<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfileExType
 *
 *
 * XSD Type: customerProfileExType
 */
class CustomerProfileExType extends CustomerProfileBaseType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

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


}

