<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CardArtType
 *
 *
 * XSD Type: cardArt
 */
class CardArtType implements \JsonSerializable
{

    /**
     * @property string $cardBrand
     */
    private $cardBrand = null;

    /**
     * @property string $cardImageHeight
     */
    private $cardImageHeight = null;

    /**
     * @property string $cardImageUrl
     */
    private $cardImageUrl = null;

    /**
     * @property string $cardImageWidth
     */
    private $cardImageWidth = null;

    /**
     * @property string $cardType
     */
    private $cardType = null;

    /**
     * Gets as cardBrand
     *
     * @return string
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * Sets a new cardBrand
     *
     * @param string $cardBrand
     * @return self
     */
    public function setCardBrand($cardBrand)
    {
        $this->cardBrand = $cardBrand;
        return $this;
    }

    /**
     * Gets as cardImageHeight
     *
     * @return string
     */
    public function getCardImageHeight()
    {
        return $this->cardImageHeight;
    }

    /**
     * Sets a new cardImageHeight
     *
     * @param string $cardImageHeight
     * @return self
     */
    public function setCardImageHeight($cardImageHeight)
    {
        $this->cardImageHeight = $cardImageHeight;
        return $this;
    }

    /**
     * Gets as cardImageUrl
     *
     * @return string
     */
    public function getCardImageUrl()
    {
        return $this->cardImageUrl;
    }

    /**
     * Sets a new cardImageUrl
     *
     * @param string $cardImageUrl
     * @return self
     */
    public function setCardImageUrl($cardImageUrl)
    {
        $this->cardImageUrl = $cardImageUrl;
        return $this;
    }

    /**
     * Gets as cardImageWidth
     *
     * @return string
     */
    public function getCardImageWidth()
    {
        return $this->cardImageWidth;
    }

    /**
     * Sets a new cardImageWidth
     *
     * @param string $cardImageWidth
     * @return self
     */
    public function setCardImageWidth($cardImageWidth)
    {
        $this->cardImageWidth = $cardImageWidth;
        return $this;
    }

    /**
     * Gets as cardType
     *
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Sets a new cardType
     *
     * @param string $cardType
     * @return self
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

