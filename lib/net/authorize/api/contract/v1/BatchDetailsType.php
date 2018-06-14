<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing BatchDetailsType
 *
 * 
 * XSD Type: batchDetailsType
 */
class BatchDetailsType
{

    /**
     * @property string $batchId
     */
    private $batchId = null;

    /**
     * @property \DateTime $settlementTimeUTC
     */
    private $settlementTimeUTC = null;

    /**
     * @property \DateTime $settlementTimeLocal
     */
    private $settlementTimeLocal = null;

    /**
     * @property string $settlementState
     */
    private $settlementState = null;

    /**
     * @property string $paymentMethod
     */
    private $paymentMethod = null;

    /**
     * @property string $marketType
     */
    private $marketType = null;

    /**
     * @property string $product
     */
    private $product = null;

    /**
     * @property \net\authorize\api\contract\v1\BatchStatisticType[] $statistics
     */
    private $statistics = null;

    /**
     * Gets as batchId
     *
     * @return string
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * Sets a new batchId
     *
     * @param string $batchId
     * @return self
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
        return $this;
    }

    /**
     * Gets as settlementTimeUTC
     *
     * @return \DateTime
     */
    public function getSettlementTimeUTC()
    {
        return $this->settlementTimeUTC;
    }

    /**
     * Sets a new settlementTimeUTC
     *
     * @param \DateTime $settlementTimeUTC
     * @return self
     */
    public function setSettlementTimeUTC(\DateTime $settlementTimeUTC)
    {
        $this->settlementTimeUTC = $settlementTimeUTC;
        return $this;
    }

    /**
     * Gets as settlementTimeLocal
     *
     * @return \DateTime
     */
    public function getSettlementTimeLocal()
    {
        return $this->settlementTimeLocal;
    }

    /**
     * Sets a new settlementTimeLocal
     *
     * @param \DateTime $settlementTimeLocal
     * @return self
     */
    public function setSettlementTimeLocal(\DateTime $settlementTimeLocal)
    {
        $this->settlementTimeLocal = $settlementTimeLocal;
        return $this;
    }

    /**
     * Gets as settlementState
     *
     * @return string
     */
    public function getSettlementState()
    {
        return $this->settlementState;
    }

    /**
     * Sets a new settlementState
     *
     * @param string $settlementState
     * @return self
     */
    public function setSettlementState($settlementState)
    {
        $this->settlementState = $settlementState;
        return $this;
    }

    /**
     * Gets as paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Sets a new paymentMethod
     *
     * @param string $paymentMethod
     * @return self
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * Gets as marketType
     *
     * @return string
     */
    public function getMarketType()
    {
        return $this->marketType;
    }

    /**
     * Sets a new marketType
     *
     * @param string $marketType
     * @return self
     */
    public function setMarketType($marketType)
    {
        $this->marketType = $marketType;
        return $this;
    }

    /**
     * Gets as product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets a new product
     *
     * @param string $product
     * @return self
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * Adds as statistic
     *
     * @return self
     * @param \net\authorize\api\contract\v1\BatchStatisticType $statistic
     */
    public function addToStatistics(\net\authorize\api\contract\v1\BatchStatisticType $statistic)
    {
        $this->statistics[] = $statistic;
        return $this;
    }

    /**
     * isset statistics
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetStatistics($index)
    {
        return isset($this->statistics[$index]);
    }

    /**
     * unset statistics
     *
     * @param scalar $index
     * @return void
     */
    public function unsetStatistics($index)
    {
        unset($this->statistics[$index]);
    }

    /**
     * Gets as statistics
     *
     * @return \net\authorize\api\contract\v1\BatchStatisticType[]
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * Sets a new statistics
     *
     * @param \net\authorize\api\contract\v1\BatchStatisticType[] $statistics
     * @return self
     */
    public function setStatistics(array $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }


}

