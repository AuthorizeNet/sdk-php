<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerPaymentProfileBaseType
 *
 *
 * XSD Type: customerPaymentProfileBaseType
 */
class CustomerPaymentProfileBaseType implements \JsonSerializable
{

    /**
     * @property string $customerType
     */
    private $customerType = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressType $billTo
     */
    private $billTo = null;

    /**
     * Gets as customerType
     *
     * @return string
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * Sets a new customerType
     *
     * @param string $customerType
     * @return self
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;
        return $this;
    }

    /**
     * Gets as billTo
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressType
     */
    public function getBillTo()
    {
        return $this->billTo;
    }

    /**
     * Sets a new billTo
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressType $billTo
     * @return self
     */
    public function setBillTo(\net\authorize\api\contract\v1\CustomerAddressType $billTo)
    {
        $this->billTo = $billTo;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

