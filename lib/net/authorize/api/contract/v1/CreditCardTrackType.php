<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreditCardTrackType
 *
 *
 * XSD Type: creditCardTrackType
 */
class CreditCardTrackType implements \JsonSerializable
{

    /**
     * @property string $track1
     */
    private $track1 = null;

    /**
     * @property string $track2
     */
    private $track2 = null;

    /**
     * Gets as track1
     *
     * @return string
     */
    public function getTrack1()
    {
        return $this->track1;
    }

    /**
     * Sets a new track1
     *
     * @param string $track1
     * @return self
     */
    public function setTrack1($track1)
    {
        $this->track1 = $track1;
        return $this;
    }

    /**
     * Gets as track2
     *
     * @return string
     */
    public function getTrack2()
    {
        return $this->track2;
    }

    /**
     * Sets a new track2
     *
     * @param string $track2
     * @return self
     */
    public function setTrack2($track2)
    {
        $this->track2 = $track2;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

