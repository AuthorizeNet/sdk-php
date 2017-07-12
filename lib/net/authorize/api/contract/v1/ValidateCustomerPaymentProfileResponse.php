<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ValidateCustomerPaymentProfileResponse
 */
class ValidateCustomerPaymentProfileResponse extends ANetApiResponseType
{

    /**
     * @property string $directResponse
     */
    private $directResponse = null;

    /**
     * Gets as directResponse
     *
     * @return string
     */
    public function getDirectResponse()
    {
        return $this->directResponse;
    }

    /**
     * Sets a new directResponse
     *
     * @param string $directResponse
     * @return self
     */
    public function setDirectResponse($directResponse)
    {
        $this->directResponse = $directResponse;
        return $this;
    }


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

