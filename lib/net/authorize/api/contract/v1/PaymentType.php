<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentType
 *
 *
 * XSD Type: paymentType
 */
class PaymentType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\CreditCardType $creditCard
     */
    private $creditCard = null;

    /**
     * @property \net\authorize\api\contract\v1\BankAccountType $bankAccount
     */
    private $bankAccount = null;

    /**
     * @property \net\authorize\api\contract\v1\CreditCardTrackType $trackData
     */
    private $trackData = null;

    /**
     * @property \net\authorize\api\contract\v1\EncryptedTrackDataType
     * $encryptedTrackData
     */
    private $encryptedTrackData = null;

    /**
     * @property \net\authorize\api\contract\v1\PayPalType $payPal
     */
    private $payPal = null;

    /**
     * @property \net\authorize\api\contract\v1\OpaqueDataType $opaqueData
     */
    private $opaqueData = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentEmvType $emv
     */
    private $emv = null;

    /**
     * Gets as creditCard
     *
     * @return \net\authorize\api\contract\v1\CreditCardType
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Sets a new creditCard
     *
     * @param \net\authorize\api\contract\v1\CreditCardType $creditCard
     * @return self
     */
    public function setCreditCard(\net\authorize\api\contract\v1\CreditCardType $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    /**
     * Gets as bankAccount
     *
     * @return \net\authorize\api\contract\v1\BankAccountType
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Sets a new bankAccount
     *
     * @param \net\authorize\api\contract\v1\BankAccountType $bankAccount
     * @return self
     */
    public function setBankAccount(\net\authorize\api\contract\v1\BankAccountType $bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * Gets as trackData
     *
     * @return \net\authorize\api\contract\v1\CreditCardTrackType
     */
    public function getTrackData()
    {
        return $this->trackData;
    }

    /**
     * Sets a new trackData
     *
     * @param \net\authorize\api\contract\v1\CreditCardTrackType $trackData
     * @return self
     */
    public function setTrackData(\net\authorize\api\contract\v1\CreditCardTrackType $trackData)
    {
        $this->trackData = $trackData;
        return $this;
    }

    /**
     * Gets as encryptedTrackData
     *
     * @return \net\authorize\api\contract\v1\EncryptedTrackDataType
     */
    public function getEncryptedTrackData()
    {
        return $this->encryptedTrackData;
    }

    /**
     * Sets a new encryptedTrackData
     *
     * @param \net\authorize\api\contract\v1\EncryptedTrackDataType $encryptedTrackData
     * @return self
     */
    public function setEncryptedTrackData(\net\authorize\api\contract\v1\EncryptedTrackDataType $encryptedTrackData)
    {
        $this->encryptedTrackData = $encryptedTrackData;
        return $this;
    }

    /**
     * Gets as payPal
     *
     * @return \net\authorize\api\contract\v1\PayPalType
     */
    public function getPayPal()
    {
        return $this->payPal;
    }

    /**
     * Sets a new payPal
     *
     * @param \net\authorize\api\contract\v1\PayPalType $payPal
     * @return self
     */
    public function setPayPal(\net\authorize\api\contract\v1\PayPalType $payPal)
    {
        $this->payPal = $payPal;
        return $this;
    }

    /**
     * Gets as opaqueData
     *
     * @return \net\authorize\api\contract\v1\OpaqueDataType
     */
    public function getOpaqueData()
    {
        return $this->opaqueData;
    }

    /**
     * Sets a new opaqueData
     *
     * @param \net\authorize\api\contract\v1\OpaqueDataType $opaqueData
     * @return self
     */
    public function setOpaqueData(\net\authorize\api\contract\v1\OpaqueDataType $opaqueData)
    {
        $this->opaqueData = $opaqueData;
        return $this;
    }

    /**
     * Gets as emv
     *
     * @return \net\authorize\api\contract\v1\PaymentEmvType
     */
    public function getEmv()
    {
        return $this->emv;
    }

    /**
     * Sets a new emv
     *
     * @param \net\authorize\api\contract\v1\PaymentEmvType $emv
     * @return self
     */
    public function setEmv(\net\authorize\api\contract\v1\PaymentEmvType $emv)
    {
        $this->emv = $emv;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

