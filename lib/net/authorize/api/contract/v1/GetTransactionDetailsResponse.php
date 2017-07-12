<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetTransactionDetailsResponse
 */
class GetTransactionDetailsResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionDetailsType $transaction
     */
    private $transaction = null;

    /**
     * @property string $clientId
     */
    private $clientId = null;

    /**
     * @property string $transrefId
     */
    private $transrefId = null;

    /**
     * Gets as transaction
     *
     * @return \net\authorize\api\contract\v1\TransactionDetailsType
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Sets a new transaction
     *
     * @param \net\authorize\api\contract\v1\TransactionDetailsType $transaction
     * @return self
     */
    public function setTransaction(\net\authorize\api\contract\v1\TransactionDetailsType $transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * Gets as clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets a new clientId
     *
     * @param string $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Gets as transrefId
     *
     * @return string
     */
    public function getTransrefId()
    {
        return $this->transrefId;
    }

    /**
     * Sets a new transrefId
     *
     * @param string $transrefId
     * @return self
     */
    public function setTransrefId($transrefId)
    {
        $this->transrefId = $transrefId;
        return $this;
    }


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}
