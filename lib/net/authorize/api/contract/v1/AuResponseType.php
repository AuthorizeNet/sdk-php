<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing AuResponseType
 *
 *
 * XSD Type: auResponseType
 */
class AuResponseType implements \JsonSerializable
{

    /**
     * @property string $auReasonCode
     */
    private $auReasonCode = null;

    /**
     * @property integer $profileCount
     */
    private $profileCount = null;

    /**
     * @property string $reasonDescription
     */
    private $reasonDescription = null;

    /**
     * Gets as auReasonCode
     *
     * @return string
     */
    public function getAuReasonCode()
    {
        return $this->auReasonCode;
    }

    /**
     * Sets a new auReasonCode
     *
     * @param string $auReasonCode
     * @return self
     */
    public function setAuReasonCode($auReasonCode)
    {
        $this->auReasonCode = $auReasonCode;
        return $this;
    }

    /**
     * Gets as profileCount
     *
     * @return integer
     */
    public function getProfileCount()
    {
        return $this->profileCount;
    }

    /**
     * Sets a new profileCount
     *
     * @param integer $profileCount
     * @return self
     */
    public function setProfileCount($profileCount)
    {
        $this->profileCount = $profileCount;
        return $this;
    }

    /**
     * Gets as reasonDescription
     *
     * @return string
     */
    public function getReasonDescription()
    {
        return $this->reasonDescription;
    }

    /**
     * Sets a new reasonDescription
     *
     * @param string $reasonDescription
     * @return self
     */
    public function setReasonDescription($reasonDescription)
    {
        $this->reasonDescription = $reasonDescription;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

