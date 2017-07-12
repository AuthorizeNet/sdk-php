<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ProfileTransactionType
 *
 *
 * XSD Type: profileTransactionType
 */
class ProfileTransactionType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransAuthCaptureType
     * $profileTransAuthCapture
     */
    private $profileTransAuthCapture = null;

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransAuthOnlyType
     * $profileTransAuthOnly
     */
    private $profileTransAuthOnly = null;

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransPriorAuthCaptureType
     * $profileTransPriorAuthCapture
     */
    private $profileTransPriorAuthCapture = null;

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransCaptureOnlyType
     * $profileTransCaptureOnly
     */
    private $profileTransCaptureOnly = null;

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransRefundType
     * $profileTransRefund
     */
    private $profileTransRefund = null;

    /**
     * @property \net\authorize\api\contract\v1\ProfileTransVoidType $profileTransVoid
     */
    private $profileTransVoid = null;

    /**
     * Gets as profileTransAuthCapture
     *
     * @return \net\authorize\api\contract\v1\ProfileTransAuthCaptureType
     */
    public function getProfileTransAuthCapture()
    {
        return $this->profileTransAuthCapture;
    }

    /**
     * Sets a new profileTransAuthCapture
     *
     * @param \net\authorize\api\contract\v1\ProfileTransAuthCaptureType
     * $profileTransAuthCapture
     * @return self
     */
    public function setProfileTransAuthCapture(\net\authorize\api\contract\v1\ProfileTransAuthCaptureType $profileTransAuthCapture)
    {
        $this->profileTransAuthCapture = $profileTransAuthCapture;
        return $this;
    }

    /**
     * Gets as profileTransAuthOnly
     *
     * @return \net\authorize\api\contract\v1\ProfileTransAuthOnlyType
     */
    public function getProfileTransAuthOnly()
    {
        return $this->profileTransAuthOnly;
    }

    /**
     * Sets a new profileTransAuthOnly
     *
     * @param \net\authorize\api\contract\v1\ProfileTransAuthOnlyType
     * $profileTransAuthOnly
     * @return self
     */
    public function setProfileTransAuthOnly(\net\authorize\api\contract\v1\ProfileTransAuthOnlyType $profileTransAuthOnly)
    {
        $this->profileTransAuthOnly = $profileTransAuthOnly;
        return $this;
    }

    /**
     * Gets as profileTransPriorAuthCapture
     *
     * @return \net\authorize\api\contract\v1\ProfileTransPriorAuthCaptureType
     */
    public function getProfileTransPriorAuthCapture()
    {
        return $this->profileTransPriorAuthCapture;
    }

    /**
     * Sets a new profileTransPriorAuthCapture
     *
     * @param \net\authorize\api\contract\v1\ProfileTransPriorAuthCaptureType
     * $profileTransPriorAuthCapture
     * @return self
     */
    public function setProfileTransPriorAuthCapture(\net\authorize\api\contract\v1\ProfileTransPriorAuthCaptureType $profileTransPriorAuthCapture)
    {
        $this->profileTransPriorAuthCapture = $profileTransPriorAuthCapture;
        return $this;
    }

    /**
     * Gets as profileTransCaptureOnly
     *
     * @return \net\authorize\api\contract\v1\ProfileTransCaptureOnlyType
     */
    public function getProfileTransCaptureOnly()
    {
        return $this->profileTransCaptureOnly;
    }

    /**
     * Sets a new profileTransCaptureOnly
     *
     * @param \net\authorize\api\contract\v1\ProfileTransCaptureOnlyType
     * $profileTransCaptureOnly
     * @return self
     */
    public function setProfileTransCaptureOnly(\net\authorize\api\contract\v1\ProfileTransCaptureOnlyType $profileTransCaptureOnly)
    {
        $this->profileTransCaptureOnly = $profileTransCaptureOnly;
        return $this;
    }

    /**
     * Gets as profileTransRefund
     *
     * @return \net\authorize\api\contract\v1\ProfileTransRefundType
     */
    public function getProfileTransRefund()
    {
        return $this->profileTransRefund;
    }

    /**
     * Sets a new profileTransRefund
     *
     * @param \net\authorize\api\contract\v1\ProfileTransRefundType $profileTransRefund
     * @return self
     */
    public function setProfileTransRefund(\net\authorize\api\contract\v1\ProfileTransRefundType $profileTransRefund)
    {
        $this->profileTransRefund = $profileTransRefund;
        return $this;
    }

    /**
     * Gets as profileTransVoid
     *
     * @return \net\authorize\api\contract\v1\ProfileTransVoidType
     */
    public function getProfileTransVoid()
    {
        return $this->profileTransVoid;
    }

    /**
     * Sets a new profileTransVoid
     *
     * @param \net\authorize\api\contract\v1\ProfileTransVoidType $profileTransVoid
     * @return self
     */
    public function setProfileTransVoid(\net\authorize\api\contract\v1\ProfileTransVoidType $profileTransVoid)
    {
        $this->profileTransVoid = $profileTransVoid;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

