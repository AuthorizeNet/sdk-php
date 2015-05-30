<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentType
 *
 *
 * XSD Type: paymentType
 */
class PaymentType
{

    /**
     * @property \net\authorize\api\contract\v1\CreditCardType $creditCard
     */
    private $creditCard = null;

    /**
     * @property \net\authorize\api\contract\v1\BankAccountType $bankAccount
     */
    private $bankAccount = null;

    /**
     * @property \net\authorize\api\contract\v1\CreditCardTrackType $trackData
     */
    private $trackData = null;

    /**
     * @property \net\authorize\api\contract\v1\EncryptedTrackDataType
     * $encryptedTrackData
     */
    private $encryptedTrackData = null;

    /**
     * @property \net\authorize\api\contract\v1\PayPalType $payPal
     */
    private $payPal = null;

    /**
     * @property \net\authorize\api\contract\v1\OpaqueDataType $opaqueData
     */
    private $opaqueData = null;

    /**
     * Gets as creditCard
     *
     * @return \net\authorize\api\contract\v1\CreditCardType
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Sets a new creditCard
     *
     * @param \net\authorize\api\contract\v1\CreditCardType $creditCard
     * @return self
     */
    public function setCreditCard(\net\authorize\api\contract\v1\CreditCardType $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    /**
     * Gets as bankAccount
     *
     * @return \net\authorize\api\contract\v1\BankAccountType
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Sets a new bankAccount
     *
     * @param \net\authorize\api\contract\v1\BankAccountType $bankAccount
     * @return self
     */
    public function setBankAccount(\net\authorize\api\contract\v1\BankAccountType $bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * Gets as trackData
     *
     * @return \net\authorize\api\contract\v1\CreditCardTrackType
     */
    public function getTrackData()
    {
        return $this->trackData;
    }

    /**
     * Sets a new trackData
     *
     * @param \net\authorize\api\contract\v1\CreditCardTrackType $trackData
     * @return self
     */
    public function setTrackData(\net\authorize\api\contract\v1\CreditCardTrackType $trackData)
    {
        $this->trackData = $trackData;
        return $this;
    }

    /**
     * Gets as encryptedTrackData
     *
     * @return \net\authorize\api\contract\v1\EncryptedTrackDataType
     */
    public function getEncryptedTrackData()
    {
        return $this->encryptedTrackData;
    }

    /**
     * Sets a new encryptedTrackData
     *
     * @param \net\authorize\api\contract\v1\EncryptedTrackDataType $encryptedTrackData
     * @return self
     */
    public function setEncryptedTrackData(\net\authorize\api\contract\v1\EncryptedTrackDataType $encryptedTrackData)
    {
        $this->encryptedTrackData = $encryptedTrackData;
        return $this;
    }

    /**
     * Gets as payPal
     *
     * @return \net\authorize\api\contract\v1\PayPalType
     */
    public function getPayPal()
    {
        return $this->payPal;
    }

    /**
     * Sets a new payPal
     *
     * @param \net\authorize\api\contract\v1\PayPalType $payPal
     * @return self
     */
    public function setPayPal(\net\authorize\api\contract\v1\PayPalType $payPal)
    {
        $this->payPal = $payPal;
        return $this;
    }

    /**
     * Gets as opaqueData
     *
     * @return \net\authorize\api\contract\v1\OpaqueDataType
     */
    public function getOpaqueData()
    {
        return $this->opaqueData;
    }

    /**
     * Sets a new opaqueData
     *
     * @param \net\authorize\api\contract\v1\OpaqueDataType $opaqueData
     * @return self
     */
    public function setOpaqueData(\net\authorize\api\contract\v1\OpaqueDataType $opaqueData)
    {
        $this->opaqueData = $opaqueData;
        return $this;
    }


}

