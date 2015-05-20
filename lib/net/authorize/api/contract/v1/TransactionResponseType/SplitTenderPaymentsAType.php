<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing SplitTenderPaymentsAType
 */
class SplitTenderPaymentsAType
{

    /**
     * @property
     * \net\authorize\api\contract\v1\TransactionResponseType\SplitTenderPaymentsAType\SplitTenderPaymentAType[]
     * $splitTenderPayment
     */
    private $splitTenderPayment = null;

    /**
     * Adds as splitTenderPayment
     *
     * @return self
     * @param
     * \net\authorize\api\contract\v1\TransactionResponseType\SplitTenderPaymentsAType\SplitTenderPaymentAType
     * $splitTenderPayment
     */
    public function addToSplitTenderPayment(\net\authorize\api\contract\v1\TransactionResponseType\SplitTenderPaymentsAType\SplitTenderPaymentAType $splitTenderPayment)
    {
        $this->splitTenderPayment[] = $splitTenderPayment;
        return $this;
    }

    /**
     * isset splitTenderPayment
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetSplitTenderPayment($index)
    {
        return isset($this->splitTenderPayment[$index]);
    }

    /**
     * unset splitTenderPayment
     *
     * @param scalar $index
     * @return void
     */
    public function unsetSplitTenderPayment($index)
    {
        unset($this->splitTenderPayment[$index]);
    }

    /**
     * Gets as splitTenderPayment
     *
     * @return
     * \net\authorize\api\contract\v1\TransactionResponseType\SplitTenderPaymentsAType\SplitTenderPaymentAType[]
     */
    public function getSplitTenderPayment()
    {
        return $this->splitTenderPayment;
    }

    /**
     * Sets a new splitTenderPayment
     *
     * @param
     * \net\authorize\api\contract\v1\TransactionResponseType\SplitTenderPaymentsAType\SplitTenderPaymentAType[]
     * $splitTenderPayment
     * @return self
     */
    public function setSplitTenderPayment(array $splitTenderPayment)
    {
        $this->splitTenderPayment = $splitTenderPayment;
        return $this;
    }


}

