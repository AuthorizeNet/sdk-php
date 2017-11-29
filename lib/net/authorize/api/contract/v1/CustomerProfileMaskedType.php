<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfileMaskedType
 *
 *
 * XSD Type: customerProfileMaskedType
 */
class CustomerProfileMaskedType extends CustomerProfileExType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType[]
     * $paymentProfiles
     */
    private $paymentProfiles = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType[] $shipToList
     */
    private $shipToList = null;

    /**
     * Adds as paymentProfiles
     *
     * @return self
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfiles
     */
    public function addToPaymentProfiles(\net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType $paymentProfiles)
    {
        $this->paymentProfiles[] = $paymentProfiles;
        return $this;
    }

    /**
     * isset paymentProfiles
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetPaymentProfiles($index)
    {
        return isset($this->paymentProfiles[$index]);
    }

    /**
     * unset paymentProfiles
     *
     * @param scalar $index
     * @return void
     */
    public function unsetPaymentProfiles($index)
    {
        unset($this->paymentProfiles[$index]);
    }

    /**
     * Gets as paymentProfiles
     *
     * @return \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType[]
     */
    public function getPaymentProfiles()
    {
        return $this->paymentProfiles;
    }

    /**
     * Sets a new paymentProfiles
     *
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType[]
     * $paymentProfiles
     * @return self
     */
    public function setPaymentProfiles(array $paymentProfiles)
    {
        $this->paymentProfiles = $paymentProfiles;
        return $this;
    }

    /**
     * Adds as shipToList
     *
     * @return self
     * @param \net\authorize\api\contract\v1\CustomerAddressExType $shipToList
     */
    public function addToShipToList(\net\authorize\api\contract\v1\CustomerAddressExType $shipToList)
    {
        $this->shipToList[] = $shipToList;
        return $this;
    }

    /**
     * isset shipToList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetShipToList($index)
    {
        return isset($this->shipToList[$index]);
    }

    /**
     * unset shipToList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetShipToList($index)
    {
        unset($this->shipToList[$index]);
    }

    /**
     * Gets as shipToList
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressExType[]
     */
    public function getShipToList()
    {
        return $this->shipToList;
    }

    /**
     * Sets a new shipToList
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressExType[] $shipToList
     * @return self
     */
    public function setShipToList(array $shipToList)
    {
        $this->shipToList = $shipToList;
        return $this;
    }


}

