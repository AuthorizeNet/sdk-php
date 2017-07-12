<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ANetApiRequestType
 *
 *
 * XSD Type: ANetApiRequest
 */
class ANetApiRequestType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\MerchantAuthenticationType
     * $merchantAuthentication
     */
    private $merchantAuthentication = null;

    /**
     * @property string $clientId
     */
    private $clientId = null;

    /**
     * @property string $refId
     */
    private $refId = null;

    /**
     * Gets as merchantAuthentication
     *
     * @return \net\authorize\api\contract\v1\MerchantAuthenticationType
     */
    public function getMerchantAuthentication()
    {
        return $this->merchantAuthentication;
    }

    /**
     * Sets a new merchantAuthentication
     *
     * @param \net\authorize\api\contract\v1\MerchantAuthenticationType
     * $merchantAuthentication
     * @return self
     */
    public function setMerchantAuthentication(\net\authorize\api\contract\v1\MerchantAuthenticationType $merchantAuthentication)
    {
        $this->merchantAuthentication = $merchantAuthentication;
        return $this;
    }

    /**
     * Gets as clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets a new clientId
     *
     * @param string $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Gets as refId
     *
     * @return string
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Sets a new refId
     *
     * @param string $refId
     * @return self
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

