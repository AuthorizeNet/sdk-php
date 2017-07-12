<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MessagesType
 *
 *
 * XSD Type: messagesType
 */
class MessagesType implements \JsonSerializable
{

    /**
     * @property string $resultCode
     */
    private $resultCode = null;

    /**
     * @property \net\authorize\api\contract\v1\MessagesType\MessageAType[] $message
     */
    private $message = null;

    /**
     * Gets as resultCode
     *
     * @return string
     */
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * Sets a new resultCode
     *
     * @param string $resultCode
     * @return self
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
        return $this;
    }

    /**
     * Adds as message
     *
     * @return self
     * @param \net\authorize\api\contract\v1\MessagesType\MessageAType $message
     */
    public function addToMessage(\net\authorize\api\contract\v1\MessagesType\MessageAType $message)
    {
        $this->message[] = $message;
        return $this;
    }

    /**
     * isset message
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetMessage($index)
    {
        return isset($this->message[$index]);
    }

    /**
     * unset message
     *
     * @param scalar $index
     * @return void
     */
    public function unsetMessage($index)
    {
        unset($this->message[$index]);
    }

    /**
     * Gets as message
     *
     * @return \net\authorize\api\contract\v1\MessagesType\MessageAType[]
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message
     *
     * @param \net\authorize\api\contract\v1\MessagesType\MessageAType[] $message
     * @return self
     */
    public function setMessage(array $message)
    {
        $this->message = $message;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

