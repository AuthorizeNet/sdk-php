<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing TransRetailInfoType
 *
 *
 * XSD Type: transRetailInfoType
 */
class TransRetailInfoType implements \JsonSerializable
{

    /**
     * @property string $marketType
     */
    private $marketType = null;

    /**
     * @property string $deviceType
     */
    private $deviceType = null;

    /**
     * @property string $customerSignature
     */
    private $customerSignature = null;

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
     * Gets as deviceType
     *
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * Sets a new deviceType
     *
     * @param string $deviceType
     * @return self
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;
        return $this;
    }

    /**
     * Gets as customerSignature
     *
     * @return string
     */
    public function getCustomerSignature()
    {
        return $this->customerSignature;
    }

    /**
     * Sets a new customerSignature
     *
     * @param string $customerSignature
     * @return self
     */
    public function setCustomerSignature($customerSignature)
    {
        $this->customerSignature = $customerSignature;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

