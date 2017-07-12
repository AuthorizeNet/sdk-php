<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ANetApiResponseType
 *
 *
 * XSD Type: ANetApiResponse
 */
class ANetApiResponseType implements \JsonSerializable
{

    /**
     * @property string $refId
     */
    private $refId = null;

    /**
     * @property \net\authorize\api\contract\v1\MessagesType $messages
     */
    private $messages = null;

    /**
     * @property string $sessionToken
     */
    private $sessionToken = null;

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

    /**
     * Gets as messages
     *
     * @return \net\authorize\api\contract\v1\MessagesType
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Sets a new messages
     *
     * @param \net\authorize\api\contract\v1\MessagesType $messages
     * @return self
     */
    public function setMessages(\net\authorize\api\contract\v1\MessagesType $messages)
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Gets as sessionToken
     *
     * @return string
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }

    /**
     * Sets a new sessionToken
     *
     * @param string $sessionToken
     * @return self
     */
    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

