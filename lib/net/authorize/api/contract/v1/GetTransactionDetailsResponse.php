<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetTransactionDetailsResponse
 */
class GetTransactionDetailsResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionDetailsType $transaction
     */
    private $transaction = null;

    /**
     * Gets as transaction
     *
     * @return \net\authorize\api\contract\v1\TransactionDetailsType
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Sets a new transaction
     *
     * @param \net\authorize\api\contract\v1\TransactionDetailsType $transaction
     * @return self
     */
    public function setTransaction(\net\authorize\api\contract\v1\TransactionDetailsType $transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }


}

