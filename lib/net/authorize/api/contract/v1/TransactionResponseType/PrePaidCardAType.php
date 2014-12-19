<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing PrePaidCardAType
 */
class PrePaidCardAType
{

    /**
     * @property string $requestedAmount
     */
    private $requestedAmount = null;

    /**
     * @property string $approvedAmount
     */
    private $approvedAmount = null;

    /**
     * @property string $balanceOnCard
     */
    private $balanceOnCard = null;

    /**
     * Gets as requestedAmount
     *
     * @return string
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * Sets a new requestedAmount
     *
     * @param string $requestedAmount
     * @return self
     */
    public function setRequestedAmount($requestedAmount)
    {
        $this->requestedAmount = $requestedAmount;
        return $this;
    }

    /**
     * Gets as approvedAmount
     *
     * @return string
     */
    public function getApprovedAmount()
    {
        return $this->approvedAmount;
    }

    /**
     * Sets a new approvedAmount
     *
     * @param string $approvedAmount
     * @return self
     */
    public function setApprovedAmount($approvedAmount)
    {
        $this->approvedAmount = $approvedAmount;
        return $this;
    }

    /**
     * Gets as balanceOnCard
     *
     * @return string
     */
    public function getBalanceOnCard()
    {
        return $this->balanceOnCard;
    }

    /**
     * Sets a new balanceOnCard
     *
     * @param string $balanceOnCard
     * @return self
     */
    public function setBalanceOnCard($balanceOnCard)
    {
        $this->balanceOnCard = $balanceOnCard;
        return $this;
    }


}

