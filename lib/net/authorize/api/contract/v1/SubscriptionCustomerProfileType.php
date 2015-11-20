<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing SubscriptionCustomerProfileType
 *
 *
 * XSD Type: subscriptionCustomerProfileType
 */
class SubscriptionCustomerProfileType extends CustomerProfileExType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfile
     */
    private $paymentProfile = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType $shippingProfile
     */
    private $shippingProfile = null;

    /**
     * Gets as paymentProfile
     *
     * @return \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     */
    public function getPaymentProfile()
    {
        return $this->paymentProfile;
    }

    /**
     * Sets a new paymentProfile
     *
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfile
     * @return self
     */
    public function setPaymentProfile(\net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType $paymentProfile)
    {
        $this->paymentProfile = $paymentProfile;
        return $this;
    }

    /**
     * Gets as shippingProfile
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressExType
     */
    public function getShippingProfile()
    {
        return $this->shippingProfile;
    }

    /**
     * Sets a new shippingProfile
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressExType $shippingProfile
     * @return self
     */
    public function setShippingProfile(\net\authorize\api\contract\v1\CustomerAddressExType $shippingProfile)
    {
        $this->shippingProfile = $shippingProfile;
        return $this;
    }


}

