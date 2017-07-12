<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentEmvType
 *
 *
 * XSD Type: paymentEmvType
 */
class PaymentEmvType implements \JsonSerializable
{

    /**
     * @property mixed $emvData
     */
    private $emvData = null;

    /**
     * @property mixed $emvDescriptor
     */
    private $emvDescriptor = null;

    /**
     * @property mixed $emvVersion
     */
    private $emvVersion = null;

    /**
     * Gets as emvData
     *
     * @return mixed
     */
    public function getEmvData()
    {
        return $this->emvData;
    }

    /**
     * Sets a new emvData
     *
     * @param mixed $emvData
     * @return self
     */
    public function setEmvData($emvData)
    {
        $this->emvData = $emvData;
        return $this;
    }

    /**
     * Gets as emvDescriptor
     *
     * @return mixed
     */
    public function getEmvDescriptor()
    {
        return $this->emvDescriptor;
    }

    /**
     * Sets a new emvDescriptor
     *
     * @param mixed $emvDescriptor
     * @return self
     */
    public function setEmvDescriptor($emvDescriptor)
    {
        $this->emvDescriptor = $emvDescriptor;
        return $this;
    }

    /**
     * Gets as emvVersion
     *
     * @return mixed
     */
    public function getEmvVersion()
    {
        return $this->emvVersion;
    }

    /**
     * Sets a new emvVersion
     *
     * @param mixed $emvVersion
     * @return self
     */
    public function setEmvVersion($emvVersion)
    {
        $this->emvVersion = $emvVersion;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

