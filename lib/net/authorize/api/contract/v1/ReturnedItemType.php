<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ReturnedItemType
 *
 *
 * XSD Type: returnedItemType
 */
class ReturnedItemType implements \JsonSerializable
{

    /**
     * @property string $id
     */
    private $id = null;

    /**
     * @property \DateTime $dateUTC
     */
    private $dateUTC = null;

    /**
     * @property \DateTime $dateLocal
     */
    private $dateLocal = null;

    /**
     * @property string $code
     */
    private $code = null;

    /**
     * @property string $description
     */
    private $description = null;

    /**
     * Gets as id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets as dateUTC
     *
     * @return \DateTime
     */
    public function getDateUTC()
    {
        return $this->dateUTC;
    }

    /**
     * Sets a new dateUTC
     *
     * @param \DateTime $dateUTC
     * @return self
     */
    public function setDateUTC(\DateTime $dateUTC)
    {
        $this->dateUTC = $dateUTC;
        return $this;
    }

    /**
     * Gets as dateLocal
     *
     * @return \DateTime
     */
    public function getDateLocal()
    {
        return $this->dateLocal;
    }

    /**
     * Sets a new dateLocal
     *
     * @param \DateTime $dateLocal
     * @return self
     */
    public function setDateLocal(\DateTime $dateLocal)
    {
        $this->dateLocal = $dateLocal;
        return $this;
    }

    /**
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

