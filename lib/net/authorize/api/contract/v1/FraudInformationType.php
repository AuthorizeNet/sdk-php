<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing FraudInformationType
 *
 *
 * XSD Type: fraudInformationType
 */
class FraudInformationType implements \JsonSerializable
{

    /**
     * @property string[] $fraudFilterList
     */
    private $fraudFilterList = null;

    /**
     * @property string $fraudAction
     */
    private $fraudAction = null;

    /**
     * Adds as fraudFilter
     *
     * @return self
     * @param string $fraudFilter
     */
    public function addToFraudFilterList($fraudFilter)
    {
        $this->fraudFilterList[] = $fraudFilter;
        return $this;
    }

    /**
     * isset fraudFilterList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetFraudFilterList($index)
    {
        return isset($this->fraudFilterList[$index]);
    }

    /**
     * unset fraudFilterList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetFraudFilterList($index)
    {
        unset($this->fraudFilterList[$index]);
    }

    /**
     * Gets as fraudFilterList
     *
     * @return string[]
     */
    public function getFraudFilterList()
    {
        return $this->fraudFilterList;
    }

    /**
     * Sets a new fraudFilterList
     *
     * @param string[] $fraudFilterList
     * @return self
     */
    public function setFraudFilterList(array $fraudFilterList)
    {
        $this->fraudFilterList = $fraudFilterList;
        return $this;
    }

    /**
     * Gets as fraudAction
     *
     * @return string
     */
    public function getFraudAction()
    {
        return $this->fraudAction;
    }

    /**
     * Sets a new fraudAction
     *
     * @param string $fraudAction
     * @return self
     */
    public function setFraudAction($fraudAction)
    {
        $this->fraudAction = $fraudAction;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

