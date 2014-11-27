<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerPaymentProfileExType
 *
 * 
 * XSD Type: customerPaymentProfileExType
 */
class CustomerPaymentProfileExType extends CustomerPaymentProfileType
{

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

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

