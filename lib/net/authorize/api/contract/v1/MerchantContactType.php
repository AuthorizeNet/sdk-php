<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MerchantContactType
 *
 *
 * XSD Type: merchantContactType
 */
class MerchantContactType implements \JsonSerializable
{

    /**
     * @property string $merchantName
     */
    private $merchantName = null;

    /**
     * @property string $merchantAddress
     */
    private $merchantAddress = null;

    /**
     * @property string $merchantCity
     */
    private $merchantCity = null;

    /**
     * @property string $merchantState
     */
    private $merchantState = null;

    /**
     * @property string $merchantZip
     */
    private $merchantZip = null;

    /**
     * @property string $merchantPhone
     */
    private $merchantPhone = null;

    /**
     * Gets as merchantName
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * Sets a new merchantName
     *
     * @param string $merchantName
     * @return self
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * Gets as merchantAddress
     *
     * @return string
     */
    public function getMerchantAddress()
    {
        return $this->merchantAddress;
    }

    /**
     * Sets a new merchantAddress
     *
     * @param string $merchantAddress
     * @return self
     */
    public function setMerchantAddress($merchantAddress)
    {
        $this->merchantAddress = $merchantAddress;
        return $this;
    }

    /**
     * Gets as merchantCity
     *
     * @return string
     */
    public function getMerchantCity()
    {
        return $this->merchantCity;
    }

    /**
     * Sets a new merchantCity
     *
     * @param string $merchantCity
     * @return self
     */
    public function setMerchantCity($merchantCity)
    {
        $this->merchantCity = $merchantCity;
        return $this;
    }

    /**
     * Gets as merchantState
     *
     * @return string
     */
    public function getMerchantState()
    {
        return $this->merchantState;
    }

    /**
     * Sets a new merchantState
     *
     * @param string $merchantState
     * @return self
     */
    public function setMerchantState($merchantState)
    {
        $this->merchantState = $merchantState;
        return $this;
    }

    /**
     * Gets as merchantZip
     *
     * @return string
     */
    public function getMerchantZip()
    {
        return $this->merchantZip;
    }

    /**
     * Sets a new merchantZip
     *
     * @param string $merchantZip
     * @return self
     */
    public function setMerchantZip($merchantZip)
    {
        $this->merchantZip = $merchantZip;
        return $this;
    }

    /**
     * Gets as merchantPhone
     *
     * @return string
     */
    public function getMerchantPhone()
    {
        return $this->merchantPhone;
    }

    /**
     * Sets a new merchantPhone
     *
     * @param string $merchantPhone
     * @return self
     */
    public function setMerchantPhone($merchantPhone)
    {
        $this->merchantPhone = $merchantPhone;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

