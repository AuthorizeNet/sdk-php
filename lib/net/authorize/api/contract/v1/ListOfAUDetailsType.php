<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ListOfAUDetailsType
 *
 *
 * XSD Type: ListOfAUDetailsType
 */
class ListOfAUDetailsType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\AuUpdateType[] $auUpdate
     */
    private $auUpdate = null;

    /**
     * @property \net\authorize\api\contract\v1\AuDeleteType[] $auDelete
     */
    private $auDelete = null;

    /**
     * Adds as auUpdate
     *
     * @return self
     * @param \net\authorize\api\contract\v1\AuUpdateType $auUpdate
     */
    public function addToAuUpdate(\net\authorize\api\contract\v1\AuUpdateType $auUpdate)
    {
        $this->auUpdate[] = $auUpdate;
        return $this;
    }

    /**
     * isset auUpdate
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetAuUpdate($index)
    {
        return isset($this->auUpdate[$index]);
    }

    /**
     * unset auUpdate
     *
     * @param scalar $index
     * @return void
     */
    public function unsetAuUpdate($index)
    {
        unset($this->auUpdate[$index]);
    }

    /**
     * Gets as auUpdate
     *
     * @return \net\authorize\api\contract\v1\AuUpdateType[]
     */
    public function getAuUpdate()
    {
        return $this->auUpdate;
    }

    /**
     * Sets a new auUpdate
     *
     * @param \net\authorize\api\contract\v1\AuUpdateType[] $auUpdate
     * @return self
     */
    public function setAuUpdate(array $auUpdate)
    {
        $this->auUpdate = $auUpdate;
        return $this;
    }

    /**
     * Adds as auDelete
     *
     * @return self
     * @param \net\authorize\api\contract\v1\AuDeleteType $auDelete
     */
    public function addToAuDelete(\net\authorize\api\contract\v1\AuDeleteType $auDelete)
    {
        $this->auDelete[] = $auDelete;
        return $this;
    }

    /**
     * isset auDelete
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetAuDelete($index)
    {
        return isset($this->auDelete[$index]);
    }

    /**
     * unset auDelete
     *
     * @param scalar $index
     * @return void
     */
    public function unsetAuDelete($index)
    {
        unset($this->auDelete[$index]);
    }

    /**
     * Gets as auDelete
     *
     * @return \net\authorize\api\contract\v1\AuDeleteType[]
     */
    public function getAuDelete()
    {
        return $this->auDelete;
    }

    /**
     * Sets a new auDelete
     *
     * @param \net\authorize\api\contract\v1\AuDeleteType[] $auDelete
     * @return self
     */
    public function setAuDelete(array $auDelete)
    {
        $this->auDelete = $auDelete;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

