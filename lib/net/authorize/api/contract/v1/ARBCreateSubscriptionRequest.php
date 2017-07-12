<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBCreateSubscriptionRequest
 */
class ARBCreateSubscriptionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\ARBSubscriptionType $subscription
     */
    private $subscription = null;

    /**
     * Gets as subscription
     *
     * @return \net\authorize\api\contract\v1\ARBSubscriptionType
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Sets a new subscription
     *
     * @param \net\authorize\api\contract\v1\ARBSubscriptionType $subscription
     * @return self
     */
    public function setSubscription(\net\authorize\api\contract\v1\ARBSubscriptionType $subscription)
    {
        $this->subscription = $subscription;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

