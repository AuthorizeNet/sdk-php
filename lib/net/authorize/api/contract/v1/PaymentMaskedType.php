<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentMaskedType
 *
 * 
 * XSD Type: paymentMaskedType
 */
class PaymentMaskedType
{

    /**
     * @property \net\authorize\api\contract\v1\CreditCardMaskedType $creditCard
     */
    private $creditCard = null;

    /**
     * @property \net\authorize\api\contract\v1\BankAccountMaskedType $bankAccount
     */
    private $bankAccount = null;

    /**
     * @property \net\authorize\api\contract\v1\TokenMaskedType $tokenInformation
     */
    private $tokenInformation = null;

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

    /**
     * Gets as bankAccount
     *
     * @return \net\authorize\api\contract\v1\BankAccountMaskedType
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Sets a new bankAccount
     *
     * @param \net\authorize\api\contract\v1\BankAccountMaskedType $bankAccount
     * @return self
     */
    public function setBankAccount(\net\authorize\api\contract\v1\BankAccountMaskedType $bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * Gets as tokenInformation
     *
     * @return \net\authorize\api\contract\v1\TokenMaskedType
     */
    public function getTokenInformation()
    {
        return $this->tokenInformation;
    }

    /**
     * Sets a new tokenInformation
     *
     * @param \net\authorize\api\contract\v1\TokenMaskedType $tokenInformation
     * @return self
     */
    public function setTokenInformation(\net\authorize\api\contract\v1\TokenMaskedType $tokenInformation)
    {
        $this->tokenInformation = $tokenInformation;
        return $this;
    }


}

