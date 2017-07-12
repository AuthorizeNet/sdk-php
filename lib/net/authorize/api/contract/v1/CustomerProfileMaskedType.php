<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfileMaskedType
 *
 *
 * XSD Type: customerProfileMaskedType
 */
class CustomerProfileMaskedType extends CustomerProfileExType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType[]
     * $paymentProfiles
     */
    private $paymentProfiles = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType[] $shipToList
     */
    private $shipToList = null;

    /**
     * Adds as paymentProfiles
     *
     * @return self
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfiles
     */
    public function addToPaymentProfiles(\net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType $paymentProfiles)
    {
        $this->paymentProfiles[] = $paymentProfiles;
        return $this;
    }

    /**
     * isset paymentProfiles
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetPaymentProfiles($index)
    {
        return isset($this->paymentProfiles[$index]);
    }

    /**
     * unset paymentProfiles
     *
     * @param scalar $index
     * @return void
     */
    public function unsetPaymentProfiles($index)
    {
        unset($this->paymentProfiles[$index]);
    }

    /**
     * Gets as paymentProfiles
     *
     * @return \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType[]
     */
    public function getPaymentProfiles()
    {
        return $this->paymentProfiles;
    }

    /**
     * Sets a new paymentProfiles
     *
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType[]
     * $paymentProfiles
     * @return self
     */
    public function setPaymentProfiles(array $paymentProfiles)
    {
        $this->paymentProfiles = $paymentProfiles;
        return $this;
    }

    /**
     * Adds as shipToList
     *
     * @return self
     * @param \net\authorize\api\contract\v1\CustomerAddressExType $shipToList
     */
    public function addToShipToList(\net\authorize\api\contract\v1\CustomerAddressExType $shipToList)
    {
        $this->shipToList[] = $shipToList;
        return $this;
    }

    /**
     * isset shipToList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetShipToList($index)
    {
        return isset($this->shipToList[$index]);
    }

    /**
     * unset shipToList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetShipToList($index)
    {
        unset($this->shipToList[$index]);
    }

    /**
     * Gets as shipToList
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressExType[]
     */
    public function getShipToList()
    {
        return $this->shipToList;
    }

    /**
     * Sets a new shipToList
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressExType[] $shipToList
     * @return self
     */
    public function setShipToList(array $shipToList)
    {
        $this->shipToList = $shipToList;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

