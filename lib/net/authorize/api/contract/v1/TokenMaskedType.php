<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing TokenMaskedType
 *
 *
 * XSD Type: tokenMaskedType
 */
class TokenMaskedType implements \JsonSerializable
{

    /**
     * @property string $tokenSource
     */
    private $tokenSource = null;

    /**
     * @property string $tokenNumber
     */
    private $tokenNumber = null;

    /**
     * @property string $expirationDate
     */
    private $expirationDate = null;

    /**
     * Gets as tokenSource
     *
     * @return string
     */
    public function getTokenSource()
    {
        return $this->tokenSource;
    }

    /**
     * Sets a new tokenSource
     *
     * @param string $tokenSource
     * @return self
     */
    public function setTokenSource($tokenSource)
    {
        $this->tokenSource = $tokenSource;
        return $this;
    }

    /**
     * Gets as tokenNumber
     *
     * @return string
     */
    public function getTokenNumber()
    {
        return $this->tokenNumber;
    }

    /**
     * Sets a new tokenNumber
     *
     * @param string $tokenNumber
     * @return self
     */
    public function setTokenNumber($tokenNumber)
    {
        $this->tokenNumber = $tokenNumber;
        return $this;
    }

    /**
     * Gets as expirationDate
     *
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Sets a new expirationDate
     *
     * @param string $expirationDate
     * @return self
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

