<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfilePaymentType
 *
 *
 * XSD Type: customerProfilePaymentType
 */
class CustomerProfilePaymentType implements \JsonSerializable
{

    /**
     * @property boolean $createProfile
     */
    private $createProfile = null;

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentProfileType $paymentProfile
     */
    private $paymentProfile = null;

    /**
     * @property string $shippingProfileId
     */
    private $shippingProfileId = null;

    /**
     * Gets as createProfile
     *
     * @return boolean
     */
    public function getCreateProfile()
    {
        return $this->createProfile;
    }

    /**
     * Sets a new createProfile
     *
     * @param boolean $createProfile
     * @return self
     */
    public function setCreateProfile($createProfile)
    {
        $this->createProfile = $createProfile;
        return $this;
    }

    /**
     * Gets as customerProfileId
     *
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * Sets a new customerProfileId
     *
     * @param string $customerProfileId
     * @return self
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    /**
     * Gets as paymentProfile
     *
     * @return \net\authorize\api\contract\v1\PaymentProfileType
     */
    public function getPaymentProfile()
    {
        return $this->paymentProfile;
    }

    /**
     * Sets a new paymentProfile
     *
     * @param \net\authorize\api\contract\v1\PaymentProfileType $paymentProfile
     * @return self
     */
    public function setPaymentProfile(\net\authorize\api\contract\v1\PaymentProfileType $paymentProfile)
    {
        $this->paymentProfile = $paymentProfile;
        return $this;
    }

    /**
     * Gets as shippingProfileId
     *
     * @return string
     */
    public function getShippingProfileId()
    {
        return $this->shippingProfileId;
    }

    /**
     * Sets a new shippingProfileId
     *
     * @param string $shippingProfileId
     * @return self
     */
    public function setShippingProfileId($shippingProfileId)
    {
        $this->shippingProfileId = $shippingProfileId;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

