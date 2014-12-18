<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfilePaymentType
 *
 * 
 * XSD Type: customerProfilePaymentType
 */
class CustomerProfilePaymentType
{

    /**
     * @property boolean $createProfile
     */
    private $createProfile = null;

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentProfileType $paymentProfile
     */
    private $paymentProfile = null;

    /**
     * @property string $shippingProfileId
     */
    private $shippingProfileId = null;

    /**
     * Gets as createProfile
     *
     * @return boolean
     */
    public function getCreateProfile()
    {
        return $this->createProfile;
    }

    /**
     * Sets a new createProfile
     *
     * @param boolean $createProfile
     * @return self
     */
    public function setCreateProfile($createProfile)
    {
        $this->createProfile = $createProfile;
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
     * Gets as paymentProfile
     *
     * @return \net\authorize\api\contract\v1\PaymentProfileType
     */
    public function getPaymentProfile()
    {
        return $this->paymentProfile;
    }

    /**
     * Sets a new paymentProfile
     *
     * @param \net\authorize\api\contract\v1\PaymentProfileType $paymentProfile
     * @return self
     */
    public function setPaymentProfile(\net\authorize\api\contract\v1\PaymentProfileType $paymentProfile)
    {
        $this->paymentProfile = $paymentProfile;
        return $this;
    }

    /**
     * Gets as shippingProfileId
     *
     * @return string
     */
    public function getShippingProfileId()
    {
        return $this->shippingProfileId;
    }

    /**
     * Sets a new shippingProfileId
     *
     * @param string $shippingProfileId
     * @return self
     */
    public function setShippingProfileId($shippingProfileId)
    {
        $this->shippingProfileId = $shippingProfileId;
        return $this;
    }


}

