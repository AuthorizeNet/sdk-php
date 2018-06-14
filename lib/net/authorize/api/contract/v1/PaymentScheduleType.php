<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentScheduleType
 *
 *
 * XSD Type: paymentScheduleType
 */
class PaymentScheduleType
{

    /**
     * @property \net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType
     * $interval
     */
    private $interval = null;

    /**
     * @property \DateTime $startDate
     */
    private $startDate = null;

    /**
     * @property integer $totalOccurrences
     */
    private $totalOccurrences = null;

    /**
     * @property integer $trialOccurrences
     */
    private $trialOccurrences = null;

    /**
     * Gets as interval
     *
     * @return \net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Sets a new interval
     *
     * @param \net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType
     * $interval
     * @return self
     */
    public function setInterval(\net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType $interval)
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * Gets as startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets a new startDate
     *
     * @param \DateTime $startDate
     * @return self
     */
    public function setStartDate(\DateTime $startDate)
    {
        $strDateOnly = $startDate->format('Y-m-d');
        $this->startDate = \DateTime::createFromFormat('!Y-m-d', $strDateOnly); 
        return $this;
    }

    /**
     * Gets as totalOccurrences
     *
     * @return integer
     */
    public function getTotalOccurrences()
    {
        return $this->totalOccurrences;
    }

    /**
     * Sets a new totalOccurrences
     *
     * @param integer $totalOccurrences
     * @return self
     */
    public function setTotalOccurrences($totalOccurrences)
    {
        $this->totalOccurrences = $totalOccurrences;
        return $this;
    }

    /**
     * Gets as trialOccurrences
     *
     * @return integer
     */
    public function getTrialOccurrences()
    {
        return $this->trialOccurrences;
    }

    /**
     * Sets a new trialOccurrences
     *
     * @param integer $trialOccurrences
     * @return self
     */
    public function setTrialOccurrences($trialOccurrences)
    {
        $this->trialOccurrences = $trialOccurrences;
        return $this;
    }


}

