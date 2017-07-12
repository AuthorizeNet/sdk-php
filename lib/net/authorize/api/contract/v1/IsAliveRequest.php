<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing IsAliveRequest
 */
class IsAliveRequest
{

    /**
     * @property string $refId
     */
    private $refId = null;

    /**
     * Gets as refId
     *
     * @return string
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Sets a new refId
     *
     * @param string $refId
     * @return self
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

