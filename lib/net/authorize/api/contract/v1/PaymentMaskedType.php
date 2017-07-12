<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentMaskedType
 *
 *
 * XSD Type: paymentMaskedType
 */
class PaymentMaskedType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\CreditCardMaskedType $creditCard
     */
    private $creditCard = null;

    /**
     * @property \net\authorize\api\contract\v1\BankAccountMaskedType $bankAccount
     */
    private $bankAccount = null;

    /**
     * @property \net\authorize\api\contract\v1\TokenMaskedType $tokenInformation
     */
    private $tokenInformation = null;

    /**
     * Gets as creditCard
     *
     * @return \net\authorize\api\contract\v1\CreditCardMaskedType
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Sets a new creditCard
     *
     * @param \net\authorize\api\contract\v1\CreditCardMaskedType $creditCard
     * @return self
     */
    public function setCreditCard(\net\authorize\api\contract\v1\CreditCardMaskedType $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    /**
     * Gets as bankAccount
     *
     * @return \net\authorize\api\contract\v1\BankAccountMaskedType
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Sets a new bankAccount
     *
     * @param \net\authorize\api\contract\v1\BankAccountMaskedType $bankAccount
     * @return self
     */
    public function setBankAccount(\net\authorize\api\contract\v1\BankAccountMaskedType $bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * Gets as tokenInformation
     *
     * @return \net\authorize\api\contract\v1\TokenMaskedType
     */
    public function getTokenInformation()
    {
        return $this->tokenInformation;
    }

    /**
     * Sets a new tokenInformation
     *
     * @param \net\authorize\api\contract\v1\TokenMaskedType $tokenInformation
     * @return self
     */
    public function setTokenInformation(\net\authorize\api\contract\v1\TokenMaskedType $tokenInformation)
    {
        $this->tokenInformation = $tokenInformation;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

