<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing UserFieldsAType
 */
class UserFieldsAType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\UserFieldType[] $userField
     */
    private $userField = null;

    /**
     * Adds as userField
     *
     * @return self
     * @param \net\authorize\api\contract\v1\UserFieldType $userField
     */
    public function addToUserField(\net\authorize\api\contract\v1\UserFieldType $userField)
    {
        $this->userField[] = $userField;
        return $this;
    }

    /**
     * isset userField
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetUserField($index)
    {
        return isset($this->userField[$index]);
    }

    /**
     * unset userField
     *
     * @param scalar $index
     * @return void
     */
    public function unsetUserField($index)
    {
        unset($this->userField[$index]);
    }

    /**
     * Gets as userField
     *
     * @return \net\authorize\api\contract\v1\UserFieldType[]
     */
    public function getUserField()
    {
        return $this->userField;
    }

    /**
     * Sets a new userField
     *
     * @param \net\authorize\api\contract\v1\UserFieldType[] $userField
     * @return self
     */
    public function setUserField(array $userField)
    {
        $this->userField = $userField;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

