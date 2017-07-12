<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateTransactionResponse
 */
class CreateTransactionResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     */
    private $transactionResponse = null;

    /**
     * @property \net\authorize\api\contract\v1\CreateProfileResponseType
     * $profileResponse
     */
    private $profileResponse = null;

    /**
     * Gets as transactionResponse
     *
     * @return \net\authorize\api\contract\v1\TransactionResponseType
     */
    public function getTransactionResponse()
    {
        return $this->transactionResponse;
    }

    /**
     * Sets a new transactionResponse
     *
     * @param \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     * @return self
     */
    public function setTransactionResponse(\net\authorize\api\contract\v1\TransactionResponseType $transactionResponse)
    {
        $this->transactionResponse = $transactionResponse;
        return $this;
    }

    /**
     * Gets as profileResponse
     *
     * @return \net\authorize\api\contract\v1\CreateProfileResponseType
     */
    public function getProfileResponse()
    {
        return $this->profileResponse;
    }

    /**
     * Sets a new profileResponse
     *
     * @param \net\authorize\api\contract\v1\CreateProfileResponseType $profileResponse
     * @return self
     */
    public function setProfileResponse(\net\authorize\api\contract\v1\CreateProfileResponseType $profileResponse)
    {
        $this->profileResponse = $profileResponse;
        return $this;
    }


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

