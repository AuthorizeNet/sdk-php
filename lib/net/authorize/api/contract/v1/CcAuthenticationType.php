<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CcAuthenticationType
 *
 *
 * XSD Type: ccAuthenticationType
 */
class CcAuthenticationType implements \JsonSerializable
{

    /**
     * @property string $authenticationIndicator
     */
    private $authenticationIndicator = null;

    /**
     * @property string $cardholderAuthenticationValue
     */
    private $cardholderAuthenticationValue = null;

    /**
     * Gets as authenticationIndicator
     *
     * @return string
     */
    public function getAuthenticationIndicator()
    {
        return $this->authenticationIndicator;
    }

    /**
     * Sets a new authenticationIndicator
     *
     * @param string $authenticationIndicator
     * @return self
     */
    public function setAuthenticationIndicator($authenticationIndicator)
    {
        $this->authenticationIndicator = $authenticationIndicator;
        return $this;
    }

    /**
     * Gets as cardholderAuthenticationValue
     *
     * @return string
     */
    public function getCardholderAuthenticationValue()
    {
        return $this->cardholderAuthenticationValue;
    }

    /**
     * Sets a new cardholderAuthenticationValue
     *
     * @param string $cardholderAuthenticationValue
     * @return self
     */
    public function setCardholderAuthenticationValue($cardholderAuthenticationValue)
    {
        $this->cardholderAuthenticationValue = $cardholderAuthenticationValue;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

