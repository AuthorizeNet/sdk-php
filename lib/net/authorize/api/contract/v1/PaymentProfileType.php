<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentProfileType
 *
 *
 * XSD Type: paymentProfile
 */
class PaymentProfileType
{

    /**
     * @property string $paymentProfileId
     */
    private $paymentProfileId = null;

    /**
     * @property string $cardCode
     */
    private $cardCode = null;

    /**
     * Gets as paymentProfileId
     *
     * @return string
     */
    public function getPaymentProfileId()
    {
        return $this->paymentProfileId;
    }

    /**
     * Sets a new paymentProfileId
     *
     * @param string $paymentProfileId
     * @return self
     */
    public function setPaymentProfileId($paymentProfileId)
    {
        $this->paymentProfileId = $paymentProfileId;
        return $this;
    }

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

