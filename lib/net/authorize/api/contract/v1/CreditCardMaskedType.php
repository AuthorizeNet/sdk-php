<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreditCardMaskedType
 *
 *
 * XSD Type: creditCardMaskedType
 */
class CreditCardMaskedType
{

    /**
     * @property string $cardNumber
     */
    private $cardNumber = null;

    /**
     * @property string $expirationDate
     */
    private $expirationDate = null;

    /**
     * @property string $cardType
     */
    private $cardType = null;

    /**
     * @property \net\authorize\api\contract\v1\CardArtType $cardArt
     */
    private $cardArt = null;

    /**
     * Gets as cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Sets a new cardNumber
     *
     * @param string $cardNumber
     * @return self
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
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

    /**
     * Gets as cardType
     *
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Sets a new cardType
     *
     * @param string $cardType
     * @return self
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
        return $this;
    }

    /**
     * Gets as cardArt
     *
     * @return \net\authorize\api\contract\v1\CardArtType
     */
    public function getCardArt()
    {
        return $this->cardArt;
    }

    /**
     * Sets a new cardArt
     *
     * @param \net\authorize\api\contract\v1\CardArtType $cardArt
     * @return self
     */
    public function setCardArt(\net\authorize\api\contract\v1\CardArtType $cardArt)
    {
        $this->cardArt = $cardArt;
        return $this;
    }


}

