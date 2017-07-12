<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateHeldTransactionRequest
 */
class UpdateHeldTransactionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\HeldTransactionRequestType
     * $heldTransactionRequest
     */
    private $heldTransactionRequest = null;

    /**
     * Gets as heldTransactionRequest
     *
     * @return \net\authorize\api\contract\v1\HeldTransactionRequestType
     */
    public function getHeldTransactionRequest()
    {
        return $this->heldTransactionRequest;
    }

    /**
     * Sets a new heldTransactionRequest
     *
     * @param \net\authorize\api\contract\v1\HeldTransactionRequestType
     * $heldTransactionRequest
     * @return self
     */
    public function setHeldTransactionRequest(\net\authorize\api\contract\v1\HeldTransactionRequestType $heldTransactionRequest)
    {
        $this->heldTransactionRequest = $heldTransactionRequest;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

