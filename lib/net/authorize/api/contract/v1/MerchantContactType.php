<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MerchantContactType
 *
 * 
 * XSD Type: merchantContactType
 */
class MerchantContactType
{

    /**
     * @property string $merchantName
     */
    private $merchantName = null;

    /**
     * @property string $merchantAddress
     */
    private $merchantAddress = null;

    /**
     * @property string $merchantCity
     */
    private $merchantCity = null;

    /**
     * @property string $merchantState
     */
    private $merchantState = null;

    /**
     * @property string $merchantZip
     */
    private $merchantZip = null;

    /**
     * @property string $merchantPhone
     */
    private $merchantPhone = null;

    /**
     * Gets as merchantName
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * Sets a new merchantName
     *
     * @param string $merchantName
     * @return self
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * Gets as merchantAddress
     *
     * @return string
     */
    public function getMerchantAddress()
    {
        return $this->merchantAddress;
    }

    /**
     * Sets a new merchantAddress
     *
     * @param string $merchantAddress
     * @return self
     */
    public function setMerchantAddress($merchantAddress)
    {
        $this->merchantAddress = $merchantAddress;
        return $this;
    }

    /**
     * Gets as merchantCity
     *
     * @return string
     */
    public function getMerchantCity()
    {
        return $this->merchantCity;
    }

    /**
     * Sets a new merchantCity
     *
     * @param string $merchantCity
     * @return self
     */
    public function setMerchantCity($merchantCity)
    {
        $this->merchantCity = $merchantCity;
        return $this;
    }

    /**
     * Gets as merchantState
     *
     * @return string
     */
    public function getMerchantState()
    {
        return $this->merchantState;
    }

    /**
     * Sets a new merchantState
     *
     * @param string $merchantState
     * @return self
     */
    public function setMerchantState($merchantState)
    {
        $this->merchantState = $merchantState;
        return $this;
    }

    /**
     * Gets as merchantZip
     *
     * @return string
     */
    public function getMerchantZip()
    {
        return $this->merchantZip;
    }

    /**
     * Sets a new merchantZip
     *
     * @param string $merchantZip
     * @return self
     */
    public function setMerchantZip($merchantZip)
    {
        $this->merchantZip = $merchantZip;
        return $this;
    }

    /**
     * Gets as merchantPhone
     *
     * @return string
     */
    public function getMerchantPhone()
    {
        return $this->merchantPhone;
    }

    /**
     * Sets a new merchantPhone
     *
     * @param string $merchantPhone
     * @return self
     */
    public function setMerchantPhone($merchantPhone)
    {
        $this->merchantPhone = $merchantPhone;
        return $this;
    }


}

