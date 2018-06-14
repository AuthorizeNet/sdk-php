<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing AuUpdateType
 *
 * 
 * XSD Type: auUpdateType
 */
class AuUpdateType extends AuDetailsType
{

    /**
     * @property \net\authorize\api\contract\v1\CreditCardMaskedType $newCreditCard
     */
    private $newCreditCard = null;

    /**
     * @property \net\authorize\api\contract\v1\CreditCardMaskedType $oldCreditCard
     */
    private $oldCreditCard = null;

    /**
     * Gets as newCreditCard
     *
     * @return \net\authorize\api\contract\v1\CreditCardMaskedType
     */
    public function getNewCreditCard()
    {
        return $this->newCreditCard;
    }

    /**
     * Sets a new newCreditCard
     *
     * @param \net\authorize\api\contract\v1\CreditCardMaskedType $newCreditCard
     * @return self
     */
    public function setNewCreditCard(\net\authorize\api\contract\v1\CreditCardMaskedType $newCreditCard)
    {
        $this->newCreditCard = $newCreditCard;
        return $this;
    }

    /**
     * Gets as oldCreditCard
     *
     * @return \net\authorize\api\contract\v1\CreditCardMaskedType
     */
    public function getOldCreditCard()
    {
        return $this->oldCreditCard;
    }

    /**
     * Sets a new oldCreditCard
     *
     * @param \net\authorize\api\contract\v1\CreditCardMaskedType $oldCreditCard
     * @return self
     */
    public function setOldCreditCard(\net\authorize\api\contract\v1\CreditCardMaskedType $oldCreditCard)
    {
        $this->oldCreditCard = $oldCreditCard;
        return $this;
    }


}

