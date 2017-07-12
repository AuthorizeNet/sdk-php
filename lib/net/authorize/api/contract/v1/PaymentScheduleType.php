<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentScheduleType
 *
 *
 * XSD Type: paymentScheduleType
 */
class PaymentScheduleType implements \JsonSerializable
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
        $this->startDate = $startDate;
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


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

