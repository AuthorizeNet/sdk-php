<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing BankAccountType
 *
 *
 * XSD Type: bankAccountType
 */
class BankAccountType implements \JsonSerializable
{

    /**
     * @property string $accountType
     */
    private $accountType = null;

    /**
     * @property string $routingNumber
     */
    private $routingNumber = null;

    /**
     * @property string $accountNumber
     */
    private $accountNumber = null;

    /**
     * @property string $nameOnAccount
     */
    private $nameOnAccount = null;

    /**
     * @property string $echeckType
     */
    private $echeckType = null;

    /**
     * @property string $bankName
     */
    private $bankName = null;

    /**
     * @property string $checkNumber
     */
    private $checkNumber = null;

    /**
     * Gets as accountType
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Sets a new accountType
     *
     * @param string $accountType
     * @return self
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
        return $this;
    }

    /**
     * Gets as routingNumber
     *
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->routingNumber;
    }

    /**
     * Sets a new routingNumber
     *
     * @param string $routingNumber
     * @return self
     */
    public function setRoutingNumber($routingNumber)
    {
        $this->routingNumber = $routingNumber;
        return $this;
    }

    /**
     * Gets as accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Sets a new accountNumber
     *
     * @param string $accountNumber
     * @return self
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * Gets as nameOnAccount
     *
     * @return string
     */
    public function getNameOnAccount()
    {
        return $this->nameOnAccount;
    }

    /**
     * Sets a new nameOnAccount
     *
     * @param string $nameOnAccount
     * @return self
     */
    public function setNameOnAccount($nameOnAccount)
    {
        $this->nameOnAccount = $nameOnAccount;
        return $this;
    }

    /**
     * Gets as echeckType
     *
     * @return string
     */
    public function getEcheckType()
    {
        return $this->echeckType;
    }

    /**
     * Sets a new echeckType
     *
     * @param string $echeckType
     * @return self
     */
    public function setEcheckType($echeckType)
    {
        $this->echeckType = $echeckType;
        return $this;
    }

    /**
     * Gets as bankName
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * Sets a new bankName
     *
     * @param string $bankName
     * @return self
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
        return $this;
    }

    /**
     * Gets as checkNumber
     *
     * @return string
     */
    public function getCheckNumber()
    {
        return $this->checkNumber;
    }

    /**
     * Sets a new checkNumber
     *
     * @param string $checkNumber
     * @return self
     */
    public function setCheckNumber($checkNumber)
    {
        $this->checkNumber = $checkNumber;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

