<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateTransactionRequest
 */
class CreateTransactionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionRequestType
     * $transactionRequest
     */
    private $transactionRequest = null;

    /**
     * Gets as transactionRequest
     *
     * @return \net\authorize\api\contract\v1\TransactionRequestType
     */
    public function getTransactionRequest()
    {
        return $this->transactionRequest;
    }

    /**
     * Sets a new transactionRequest
     *
     * @param \net\authorize\api\contract\v1\TransactionRequestType $transactionRequest
     * @return self
     */
    public function setTransactionRequest(\net\authorize\api\contract\v1\TransactionRequestType $transactionRequest)
    {
        $this->transactionRequest = $transactionRequest;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

