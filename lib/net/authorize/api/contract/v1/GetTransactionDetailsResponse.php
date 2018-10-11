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
     * @property string $clientId
     */
    private $clientId = null;

    /**
     * @property string $transrefId
     */
    private $transrefId = null;

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

    /**
     * Gets as clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets a new clientId
     *
     * @param string $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Gets as transrefId
     *
     * @return string
     */
    public function getTransrefId()
    {
        return $this->transrefId;
    }

    /**
     * Sets a new transrefId
     *
     * @param string $transrefId
     * @return self
     */
    public function setTransrefId($transrefId)
    {
        $this->transrefId = $transrefId;
        return $this;
    }


}

