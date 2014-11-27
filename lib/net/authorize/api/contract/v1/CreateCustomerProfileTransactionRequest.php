<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateCustomerProfileTransactionRequest
 */
class CreateCustomerProfileTransactionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransactionType $transaction
     */
    private $transaction = null;

    /**
     * @property string $extraOptions
     */
    private $extraOptions = null;

    /**
     * Gets as transaction
     *
     * @return \net\authorize\api\contract\v1\ProfileTransactionType
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Sets a new transaction
     *
     * @param \net\authorize\api\contract\v1\ProfileTransactionType $transaction
     * @return self
     */
    public function setTransaction(\net\authorize\api\contract\v1\ProfileTransactionType $transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * Gets as extraOptions
     *
     * @return string
     */
    public function getExtraOptions()
    {
        return $this->extraOptions;
    }

    /**
     * Sets a new extraOptions
     *
     * @param string $extraOptions
     * @return self
     */
    public function setExtraOptions($extraOptions)
    {
        $this->extraOptions = $extraOptions;
        return $this;
    }


}

