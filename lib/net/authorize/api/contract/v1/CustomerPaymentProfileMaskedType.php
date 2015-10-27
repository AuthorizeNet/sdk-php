<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerPaymentProfileMaskedType
 *
 *
 * XSD Type: customerPaymentProfileMaskedType
 */
class CustomerPaymentProfileMaskedType extends CustomerPaymentProfileBaseType
{

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentMaskedType $payment
     */
    private $payment = null;

    /**
     * @property \net\authorize\api\contract\v1\DriversLicenseMaskedType
     * $driversLicense
     */
    private $driversLicense = null;

    /**
     * @property string $taxId
     */
    private $taxId = null;

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
     * Gets as payment
     *
     * @return \net\authorize\api\contract\v1\PaymentMaskedType
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Sets a new payment
     *
     * @param \net\authorize\api\contract\v1\PaymentMaskedType $payment
     * @return self
     */
    public function setPayment(\net\authorize\api\contract\v1\PaymentMaskedType $payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * Gets as driversLicense
     *
     * @return \net\authorize\api\contract\v1\DriversLicenseMaskedType
     */
    public function getDriversLicense()
    {
        return $this->driversLicense;
    }

    /**
     * Sets a new driversLicense
     *
     * @param \net\authorize\api\contract\v1\DriversLicenseMaskedType $driversLicense
     * @return self
     */
    public function setDriversLicense(\net\authorize\api\contract\v1\DriversLicenseMaskedType $driversLicense)
    {
        $this->driversLicense = $driversLicense;
        return $this;
    }

    /**
     * Gets as taxId
     *
     * @return string
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * Sets a new taxId
     *
     * @param string $taxId
     * @return self
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
        return $this;
    }


}

