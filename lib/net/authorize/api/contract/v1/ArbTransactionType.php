<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ArbTransactionType
 *
 * 
 * XSD Type: arbTransaction
 */
class ArbTransactionType
{

    /**
     * @property string $transId
     */
    private $transId = null;

    /**
     * @property string $response
     */
    private $response = null;

    /**
     * @property \DateTime $submitTimeUTC
     */
    private $submitTimeUTC = null;

    /**
     * @property integer $payNum
     */
    private $payNum = null;

    /**
     * @property integer $attemptNum
     */
    private $attemptNum = null;

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
     * Gets as response
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response
     *
     * @param string $response
     * @return self
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Gets as submitTimeUTC
     *
     * @return \DateTime
     */
    public function getSubmitTimeUTC()
    {
        return $this->submitTimeUTC;
    }

    /**
     * Sets a new submitTimeUTC
     *
     * @param \DateTime $submitTimeUTC
     * @return self
     */
    public function setSubmitTimeUTC(\DateTime $submitTimeUTC)
    {
        $this->submitTimeUTC = $submitTimeUTC;
        return $this;
    }

    /**
     * Gets as payNum
     *
     * @return integer
     */
    public function getPayNum()
    {
        return $this->payNum;
    }

    /**
     * Sets a new payNum
     *
     * @param integer $payNum
     * @return self
     */
    public function setPayNum($payNum)
    {
        $this->payNum = $payNum;
        return $this;
    }

    /**
     * Gets as attemptNum
     *
     * @return integer
     */
    public function getAttemptNum()
    {
        return $this->attemptNum;
    }

    /**
     * Sets a new attemptNum
     *
     * @param integer $attemptNum
     * @return self
     */
    public function setAttemptNum($attemptNum)
    {
        $this->attemptNum = $attemptNum;
        return $this;
    }


}

