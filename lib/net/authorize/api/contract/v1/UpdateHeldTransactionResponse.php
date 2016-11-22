<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateHeldTransactionResponse
 */
class UpdateHeldTransactionResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     */
    private $transactionResponse = null;

    /**
     * Gets as transactionResponse
     *
     * @return \net\authorize\api\contract\v1\TransactionResponseType
     */
    public function getTransactionResponse()
    {
        return $this->transactionResponse;
    }

    /**
     * Sets a new transactionResponse
     *
     * @param \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     * @return self
     */
    public function setTransactionResponse(\net\authorize\api\contract\v1\TransactionResponseType $transactionResponse)
    {
        $this->transactionResponse = $transactionResponse;
        return $this;
    }


}

