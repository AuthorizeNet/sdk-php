<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreditCardType
 *
 * 
 * XSD Type: creditCardType
 */
class CreditCardType extends CreditCardSimpleType
{

    /**
     * @property string $cardCode
     */
    private $cardCode = null;

    /**
     * @property boolean $isPaymentToken
     */
    private $isPaymentToken = null;

    /**
     * @property string $cryptogram
     */
    private $cryptogram = null;

    /**
     * @property string $tokenRequestorName
     */
    private $tokenRequestorName = null;

    /**
     * @property string $tokenRequestorId
     */
    private $tokenRequestorId = null;

    /**
     * @property string $tokenRequestorEci
     */
    private $tokenRequestorEci = null;

    /**
     * Gets as cardCode
     *
     * @return string
     */
    public function getCardCode()
    {
        return $this->cardCode;
    }

    /**
     * Sets a new cardCode
     *
     * @param string $cardCode
     * @return self
     */
    public function setCardCode($cardCode)
    {
        $this->cardCode = $cardCode;
        return $this;
    }

    /**
     * Gets as isPaymentToken
     *
     * @return boolean
     */
    public function getIsPaymentToken()
    {
        return $this->isPaymentToken;
    }

    /**
     * Sets a new isPaymentToken
     *
     * @param boolean $isPaymentToken
     * @return self
     */
    public function setIsPaymentToken($isPaymentToken)
    {
        $this->isPaymentToken = $isPaymentToken;
        return $this;
    }

    /**
     * Gets as cryptogram
     *
     * @return string
     */
    public function getCryptogram()
    {
        return $this->cryptogram;
    }

    /**
     * Sets a new cryptogram
     *
     * @param string $cryptogram
     * @return self
     */
    public function setCryptogram($cryptogram)
    {
        $this->cryptogram = $cryptogram;
        return $this;
    }

    /**
     * Gets as tokenRequestorName
     *
     * @return string
     */
    public function getTokenRequestorName()
    {
        return $this->tokenRequestorName;
    }

    /**
     * Sets a new tokenRequestorName
     *
     * @param string $tokenRequestorName
     * @return self
     */
    public function setTokenRequestorName($tokenRequestorName)
    {
        $this->tokenRequestorName = $tokenRequestorName;
        return $this;
    }

    /**
     * Gets as tokenRequestorId
     *
     * @return string
     */
    public function getTokenRequestorId()
    {
        return $this->tokenRequestorId;
    }

    /**
     * Sets a new tokenRequestorId
     *
     * @param string $tokenRequestorId
     * @return self
     */
    public function setTokenRequestorId($tokenRequestorId)
    {
        $this->tokenRequestorId = $tokenRequestorId;
        return $this;
    }

    /**
     * Gets as tokenRequestorEci
     *
     * @return string
     */
    public function getTokenRequestorEci()
    {
        return $this->tokenRequestorEci;
    }

    /**
     * Sets a new tokenRequestorEci
     *
     * @param string $tokenRequestorEci
     * @return self
     */
    public function setTokenRequestorEci($tokenRequestorEci)
    {
        $this->tokenRequestorEci = $tokenRequestorEci;
        return $this;
    }


}

