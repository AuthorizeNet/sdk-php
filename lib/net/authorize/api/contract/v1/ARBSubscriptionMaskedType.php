<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBSubscriptionMaskedType
 *
 *
 * XSD Type: ARBSubscriptionMaskedType
 */
class ARBSubscriptionMaskedType
{

    /**
     * @property string $name
     */
    private $name = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentScheduleType $paymentSchedule
     */
    private $paymentSchedule = null;

    /**
     * @property float $amount
     */
    private $amount = null;

    /**
     * @property float $trialAmount
     */
    private $trialAmount = null;

    /**
     * @property string $status
     */
    private $status = null;

    /**
     * @property \net\authorize\api\contract\v1\SubscriptionCustomerProfileType
     * $profile
     */
    private $profile = null;

    /**
     * @property \net\authorize\api\contract\v1\OrderType $order
     */
    private $order = null;

    /**
     * Gets as name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as paymentSchedule
     *
     * @return \net\authorize\api\contract\v1\PaymentScheduleType
     */
    public function getPaymentSchedule()
    {
        return $this->paymentSchedule;
    }

    /**
     * Sets a new paymentSchedule
     *
     * @param \net\authorize\api\contract\v1\PaymentScheduleType $paymentSchedule
     * @return self
     */
    public function setPaymentSchedule(\net\authorize\api\contract\v1\PaymentScheduleType $paymentSchedule)
    {
        $this->paymentSchedule = $paymentSchedule;
        return $this;
    }

    /**
     * Gets as amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as trialAmount
     *
     * @return float
     */
    public function getTrialAmount()
    {
        return $this->trialAmount;
    }

    /**
     * Sets a new trialAmount
     *
     * @param float $trialAmount
     * @return self
     */
    public function setTrialAmount($trialAmount)
    {
        $this->trialAmount = $trialAmount;
        return $this;
    }

    /**
     * Gets as status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\SubscriptionCustomerProfileType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\SubscriptionCustomerProfileType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\SubscriptionCustomerProfileType $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * Gets as order
     *
     * @return \net\authorize\api\contract\v1\OrderType
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets a new order
     *
     * @param \net\authorize\api\contract\v1\OrderType $order
     * @return self
     */
    public function setOrder(\net\authorize\api\contract\v1\OrderType $order)
    {
        $this->order = $order;
        return $this;
    }


}

