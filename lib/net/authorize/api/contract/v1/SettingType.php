<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing SettingType
 *
 *
 * XSD Type: settingType
 */
class SettingType implements \JsonSerializable
{

    /**
     * @property string $settingName
     */
    private $settingName = null;

    /**
     * @property string $settingValue
     */
    private $settingValue = null;

    /**
     * Gets as settingName
     *
     * @return string
     */
    public function getSettingName()
    {
        return $this->settingName;
    }

    /**
     * Sets a new settingName
     *
     * @param string $settingName
     * @return self
     */
    public function setSettingName($settingName)
    {
        $this->settingName = $settingName;
        return $this;
    }

    /**
     * Gets as settingValue
     *
     * @return string
     */
    public function getSettingValue()
    {
        return $this->settingValue;
    }

    /**
     * Sets a new settingValue
     *
     * @param string $settingValue
     * @return self
     */
    public function setSettingValue($settingValue)
    {
        $this->settingValue = $settingValue;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

