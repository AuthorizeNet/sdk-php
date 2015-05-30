<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetUnsettledTransactionListResponse
 */
class GetUnsettledTransactionListResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionSummaryType[] $transactions
     */
    private $transactions = null;

    /**
     * Adds as transaction
     *
     * @return self
     * @param \net\authorize\api\contract\v1\TransactionSummaryType $transaction
     */
    public function addToTransactions(\net\authorize\api\contract\v1\TransactionSummaryType $transaction)
    {
        $this->transactions[] = $transaction;
        return $this;
    }

    /**
     * isset transactions
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetTransactions($index)
    {
        return isset($this->transactions[$index]);
    }

    /**
     * unset transactions
     *
     * @param scalar $index
     * @return void
     */
    public function unsetTransactions($index)
    {
        unset($this->transactions[$index]);
    }

    /**
     * Gets as transactions
     *
     * @return \net\authorize\api\contract\v1\TransactionSummaryType[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Sets a new transactions
     *
     * @param \net\authorize\api\contract\v1\TransactionSummaryType[] $transactions
     * @return self
     */
    public function setTransactions(array $transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }


}

