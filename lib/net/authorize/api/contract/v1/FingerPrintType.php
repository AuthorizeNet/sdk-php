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


}

