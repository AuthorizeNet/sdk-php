<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PayPalType
 *
 *
 * XSD Type: payPalType
 */
class PayPalType implements \JsonSerializable
{

    /**
     * @property string $successUrl
     */
    private $successUrl = null;

    /**
     * @property string $cancelUrl
     */
    private $cancelUrl = null;

    /**
     * @property string $paypalLc
     */
    private $paypalLc = null;

    /**
     * @property string $paypalHdrImg
     */
    private $paypalHdrImg = null;

    /**
     * @property string $paypalPayflowcolor
     */
    private $paypalPayflowcolor = null;

    /**
     * @property string $payerID
     */
    private $payerID = null;

    /**
     * Gets as successUrl
     *
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * Sets a new successUrl
     *
     * @param string $successUrl
     * @return self
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
        return $this;
    }

    /**
     * Gets as cancelUrl
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * Sets a new cancelUrl
     *
     * @param string $cancelUrl
     * @return self
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /**
     * Gets as paypalLc
     *
     * @return string
     */
    public function getPaypalLc()
    {
        return $this->paypalLc;
    }

    /**
     * Sets a new paypalLc
     *
     * @param string $paypalLc
     * @return self
     */
    public function setPaypalLc($paypalLc)
    {
        $this->paypalLc = $paypalLc;
        return $this;
    }

    /**
     * Gets as paypalHdrImg
     *
     * @return string
     */
    public function getPaypalHdrImg()
    {
        return $this->paypalHdrImg;
    }

    /**
     * Sets a new paypalHdrImg
     *
     * @param string $paypalHdrImg
     * @return self
     */
    public function setPaypalHdrImg($paypalHdrImg)
    {
        $this->paypalHdrImg = $paypalHdrImg;
        return $this;
    }

    /**
     * Gets as paypalPayflowcolor
     *
     * @return string
     */
    public function getPaypalPayflowcolor()
    {
        return $this->paypalPayflowcolor;
    }

    /**
     * Sets a new paypalPayflowcolor
     *
     * @param string $paypalPayflowcolor
     * @return self
     */
    public function setPaypalPayflowcolor($paypalPayflowcolor)
    {
        $this->paypalPayflowcolor = $paypalPayflowcolor;
        return $this;
    }

    /**
     * Gets as payerID
     *
     * @return string
     */
    public function getPayerID()
    {
        return $this->payerID;
    }

    /**
     * Sets a new payerID
     *
     * @param string $payerID
     * @return self
     */
    public function setPayerID($payerID)
    {
        $this->payerID = $payerID;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

