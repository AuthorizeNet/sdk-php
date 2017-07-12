<?php

namespace net\authorize\api\contract\v1\TransactionDetailsType;

/**
 * Class representing EmvDetailsAType
 */
class EmvDetailsAType implements \JsonSerializable
{

    /**
     * @property
     * \net\authorize\api\contract\v1\TransactionDetailsType\EmvDetailsAType\TagAType[]
     * $tag
     */
    private $tag = null;

    /**
     * Adds as tag
     *
     * @return self
     * @param
     * \net\authorize\api\contract\v1\TransactionDetailsType\EmvDetailsAType\TagAType
     * $tag
     */
    public function addToTag(\net\authorize\api\contract\v1\TransactionDetailsType\EmvDetailsAType\TagAType $tag)
    {
        $this->tag[] = $tag;
        return $this;
    }

    /**
     * isset tag
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetTag($index)
    {
        return isset($this->tag[$index]);
    }

    /**
     * unset tag
     *
     * @param scalar $index
     * @return void
     */
    public function unsetTag($index)
    {
        unset($this->tag[$index]);
    }

    /**
     * Gets as tag
     *
     * @return
     * \net\authorize\api\contract\v1\TransactionDetailsType\EmvDetailsAType\TagAType[]
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Sets a new tag
     *
     * @param
     * \net\authorize\api\contract\v1\TransactionDetailsType\EmvDetailsAType\TagAType[]
     * $tag
     * @return self
     */
    public function setTag(array $tag)
    {
        $this->tag = $tag;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

