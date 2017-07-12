<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerPaymentProfileResponse
 */
class GetCustomerPaymentProfileResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileMaskedType
     * $paymentProfile
     */
    private $paymentProfile = null;

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


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

