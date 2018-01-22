<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing FingerPrintType
 *
 *
 * XSD Type: fingerPrintType
 */
class FingerPrintType
{

    /**
     * @property string $hashValue
     */
    private $hashValue = null;

    /**
     * @property string $sequence
     */
    private $sequence = null;

    /**
     * @property string $timestamp
     */
    private $timestamp = null;

    /**
     * @property string $currencyCode
     */
    private $currencyCode = null;

    /**
     * @property string $amount
     */
    private $amount = null;

    /**
     * Gets as hashValue
     *
     * @return string
     */
    public function getHashValue()
    {
        return $this->hashValue;
    }

    /**
     * Sets a new hashValue
     *
     * @param string $hashValue
     * @return self
     */
    public function setHashValue($hashValue)
    {
        $this->hashValue = $hashValue;
        return $this;
    }

    /**
     * Gets as sequence
     *
     * @return string
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Sets a new sequence
     *
     * @param string $sequence
     * @return self
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * Gets as timestamp
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Sets a new timestamp
     *
     * @param string $timestamp
     * @return self
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Gets as currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Sets a new currencyCode
     *
     * @param string $currencyCode
     * @return self
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Gets as amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param string $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }


}

