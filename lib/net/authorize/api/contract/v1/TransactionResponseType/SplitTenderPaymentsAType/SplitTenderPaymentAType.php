<?php

namespace net\authorize\api\contract\v1\TransactionResponseType\SplitTenderPaymentsAType;

/**
 * Class representing SplitTenderPaymentAType
 */
class SplitTenderPaymentAType
{

    /**
     * @property string $transId
     */
    private $transId = null;

    /**
     * @property string $responseCode
     */
    private $responseCode = null;

    /**
     * @property string $responseToCustomer
     */
    private $responseToCustomer = null;

    /**
     * @property string $authCode
     */
    private $authCode = null;

    /**
     * @property string $accountNumber
     */
    private $accountNumber = null;

    /**
     * @property string $accountType
     */
    private $accountType = null;

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
     * Gets as transId
     *
     * @return string
     */
    public function getTransId()
    {
        return $this->transId;
    }

    /**
     * Sets a new transId
     *
     * @param string $transId
     * @return self
     */
    public function setTransId($transId)
    {
        $this->transId = $transId;
        return $this;
    }

    /**
     * Gets as responseCode
     *
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Sets a new responseCode
     *
     * @param string $responseCode
     * @return self
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
        return $this;
    }

    /**
     * Gets as responseToCustomer
     *
     * @return string
     */
    public function getResponseToCustomer()
    {
        return $this->responseToCustomer;
    }

    /**
     * Sets a new responseToCustomer
     *
     * @param string $responseToCustomer
     * @return self
     */
    public function setResponseToCustomer($responseToCustomer)
    {
        $this->responseToCustomer = $responseToCustomer;
        return $this;
    }

    /**
     * Gets as authCode
     *
     * @return string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * Sets a new authCode
     *
     * @param string $authCode
     * @return self
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
        return $this;
    }

    /**
     * Gets as accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Sets a new accountNumber
     *
     * @param string $accountNumber
     * @return self
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * Gets as accountType
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Sets a new accountType
     *
     * @param string $accountType
     * @return self
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
        return $this;
    }

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

