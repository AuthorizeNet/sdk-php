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


}

