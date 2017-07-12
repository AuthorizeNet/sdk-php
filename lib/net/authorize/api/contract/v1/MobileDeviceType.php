<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MobileDeviceType
 *
 *
 * XSD Type: mobileDeviceType
 */
class MobileDeviceType implements \JsonSerializable
{

    /**
     * @property string $mobileDeviceId
     */
    private $mobileDeviceId = null;

    /**
     * @property string $description
     */
    private $description = null;

    /**
     * @property string $phoneNumber
     */
    private $phoneNumber = null;

    /**
     * @property string $devicePlatform
     */
    private $devicePlatform = null;

    /**
     * @property string $deviceActivation
     */
    private $deviceActivation = null;

    /**
     * Gets as mobileDeviceId
     *
     * @return string
     */
    public function getMobileDeviceId()
    {
        return $this->mobileDeviceId;
    }

    /**
     * Sets a new mobileDeviceId
     *
     * @param string $mobileDeviceId
     * @return self
     */
    public function setMobileDeviceId($mobileDeviceId)
    {
        $this->mobileDeviceId = $mobileDeviceId;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets a new phoneNumber
     *
     * @param string $phoneNumber
     * @return self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Gets as devicePlatform
     *
     * @return string
     */
    public function getDevicePlatform()
    {
        return $this->devicePlatform;
    }

    /**
     * Sets a new devicePlatform
     *
     * @param string $devicePlatform
     * @return self
     */
    public function setDevicePlatform($devicePlatform)
    {
        $this->devicePlatform = $devicePlatform;
        return $this;
    }

    /**
     * Gets as deviceActivation
     *
     * @return string
     */
    public function getDeviceActivation()
    {
        return $this->deviceActivation;
    }

    /**
     * Sets a new deviceActivation
     *
     * @param string $deviceActivation
     * @return self
     */
    public function setDeviceActivation($deviceActivation)
    {
        $this->deviceActivation = $deviceActivation;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

