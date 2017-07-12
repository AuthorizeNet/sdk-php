<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateCustomerProfileRequest
 */
class UpdateCustomerProfileRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerProfileExType $profile
     */
    private $profile = null;

    /**
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\CustomerProfileExType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\CustomerProfileExType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\CustomerProfileExType $profile)
    {
        $this->profile = $profile;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

