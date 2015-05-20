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


}

