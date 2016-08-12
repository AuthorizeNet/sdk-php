<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing AuDeleteType
 *
 *
 * XSD Type: auDeleteType
 */
class AuDeleteType extends AuDetailsType
{

    /**
     * @property \net\authorize\api\contract\v1\CreditCardMaskedType $creditCard
     */
    private $creditCard = null;

    /**
     * Gets as creditCard
     *
     * @return \net\authorize\api\contract\v1\CreditCardMaskedType
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Sets a new creditCard
     *
     * @param \net\authorize\api\contract\v1\CreditCardMaskedType $creditCard
     * @return self
     */
    public function setCreditCard(\net\authorize\api\contract\v1\CreditCardMaskedType $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }


}

