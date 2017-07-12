<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing SubscriptionCustomerProfileType
 *
 *
 * XSD Type: subscriptionCustomerProfileType
 */
class SubscriptionCustomerProfileType extends CustomerProfileExType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfile
     */
    private $paymentProfile = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType $shippingProfile
     */
    private $shippingProfile = null;

    /**
     * Gets as paymentProfile
     *
     * @return \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     */
    public function getPaymentProfile()
    {
        return $this->paymentProfile;
    }

    /**
     * Sets a new paymentProfile
     *
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfile
     * @return self
     */
    public function setPaymentProfile(\net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType $paymentProfile)
    {
        $this->paymentProfile = $paymentProfile;
        return $this;
    }

    /**
     * Gets as shippingProfile
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressExType
     */
    public function getShippingProfile()
    {
        return $this->shippingProfile;
    }

    /**
     * Sets a new shippingProfile
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressExType $shippingProfile
     * @return self
     */
    public function setShippingProfile(\net\authorize\api\contract\v1\CustomerAddressExType $shippingProfile)
    {
        $this->shippingProfile = $shippingProfile;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

