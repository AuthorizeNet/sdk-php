<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing EmvResponseAType
 */
class EmvResponseAType implements \JsonSerializable
{

    /**
     * @property string $tlvData
     */
    private $tlvData = null;

    /**
     * @property \net\authorize\api\contract\v1\EmvTagType[] $tags
     */
    private $tags = null;

    /**
     * Gets as tlvData
     *
     * @return string
     */
    public function getTlvData()
    {
        return $this->tlvData;
    }

    /**
     * Sets a new tlvData
     *
     * @param string $tlvData
     * @return self
     */
    public function setTlvData($tlvData)
    {
        $this->tlvData = $tlvData;
        return $this;
    }

    /**
     * Adds as tag
     *
     * @return self
     * @param \net\authorize\api\contract\v1\EmvTagType $tag
     */
    public function addToTags(\net\authorize\api\contract\v1\EmvTagType $tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * isset tags
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetTags($index)
    {
        return isset($this->tags[$index]);
    }

    /**
     * unset tags
     *
     * @param scalar $index
     * @return void
     */
    public function unsetTags($index)
    {
        unset($this->tags[$index]);
    }

    /**
     * Gets as tags
     *
     * @return \net\authorize\api\contract\v1\EmvTagType[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets a new tags
     *
     * @param \net\authorize\api\contract\v1\EmvTagType[] $tags
     * @return self
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

