<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing DecryptPaymentDataRequest
 */
class DecryptPaymentDataRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\OpaqueDataType $opaqueData
     */
    private $opaqueData = null;

    /**
     * @property string $callId
     */
    private $callId = null;

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
     * Gets as callId
     *
     * @return string
     */
    public function getCallId()
    {
        return $this->callId;
    }

    /**
     * Sets a new callId
     *
     * @param string $callId
     * @return self
     */
    public function setCallId($callId)
    {
        $this->callId = $callId;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

