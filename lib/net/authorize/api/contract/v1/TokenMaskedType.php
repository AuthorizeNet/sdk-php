<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing TokenMaskedType
 *
 * 
 * XSD Type: tokenMaskedType
 */
class TokenMaskedType
{

    /**
     * @property string $tokenSource
     */
    private $tokenSource = null;

    /**
     * @property string $tokenNumber
     */
    private $tokenNumber = null;

    /**
     * @property string $expirationDate
     */
    private $expirationDate = null;

    /**
     * Gets as tokenSource
     *
     * @return string
     */
    public function getTokenSource()
    {
        return $this->tokenSource;
    }

    /**
     * Sets a new tokenSource
     *
     * @param string $tokenSource
     * @return self
     */
    public function setTokenSource($tokenSource)
    {
        $this->tokenSource = $tokenSource;
        return $this;
    }

    /**
     * Gets as tokenNumber
     *
     * @return string
     */
    public function getTokenNumber()
    {
        return $this->tokenNumber;
    }

    /**
     * Sets a new tokenNumber
     *
     * @param string $tokenNumber
     * @return self
     */
    public function setTokenNumber($tokenNumber)
    {
        $this->tokenNumber = $tokenNumber;
        return $this;
    }

    /**
     * Gets as expirationDate
     *
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Sets a new expirationDate
     *
     * @param string $expirationDate
     * @return self
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }


}

