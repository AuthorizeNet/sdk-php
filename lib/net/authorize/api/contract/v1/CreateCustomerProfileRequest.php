<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateCustomerProfileRequest
 */
class CreateCustomerProfileRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerProfileType $profile
     */
    private $profile = null;

    /**
     * @property string $validationMode
     */
    private $validationMode = null;

    /**
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\CustomerProfileType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\CustomerProfileType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\CustomerProfileType $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * Gets as validationMode
     *
     * @return string
     */
    public function getValidationMode()
    {
        return $this->validationMode;
    }

    /**
     * Sets a new validationMode
     *
     * @param string $validationMode
     * @return self
     */
    public function setValidationMode($validationMode)
    {
        $this->validationMode = $validationMode;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

