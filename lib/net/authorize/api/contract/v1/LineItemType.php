<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing LineItemType
 *
 *
 * XSD Type: lineItemType
 */
class LineItemType implements \JsonSerializable
{

    /**
     * @property string $itemId
     */
    private $itemId = null;

    /**
     * @property string $name
     */
    private $name = null;

    /**
     * @property string $description
     */
    private $description = null;

    /**
     * @property float $quantity
     */
    private $quantity = null;

    /**
     * @property float $unitPrice
     */
    private $unitPrice = null;

    /**
     * @property boolean $taxable
     */
    private $taxable = null;

    /**
     * Gets as itemId
     *
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Sets a new itemId
     *
     * @param string $itemId
     * @return self
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
        return $this;
    }

    /**
     * Gets as name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * Gets as quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * @param float $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Gets as unitPrice
     *
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Sets a new unitPrice
     *
     * @param float $unitPrice
     * @return self
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * Gets as taxable
     *
     * @return boolean
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * Sets a new taxable
     *
     * @param boolean $taxable
     * @return self
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;
        return $this;
    }


    // Json Serialize Code
    public function jsonSerialize(){
        $values = array_filter((array)get_object_vars($this),
        function ($val){
            return !is_null($val);
        });
        $mapper = \net\authorize\util\Mapper::Instance();
        foreach($values as $key => $value){
            $classDetails = $mapper->getClass(get_class() , $key);
            if (isset($value)){
                if ($classDetails->className === 'Date'){
                    $dateTime = $value->format('Y-m-d');
                    $values[$key] = $dateTime;
                }
                else if ($classDetails->className === 'DateTime'){
                    $dateTime = $value->format('Y-m-d\TH:i:s\Z');
                    $values[$key] = $dateTime;
                }
                if (is_array($value)){
                    if (!$classDetails->isInlineArray){
                        $subKey = $classDetails->arrayEntryname;
                        $subArray = [$subKey => $value];
                        $values[$key] = $subArray;
                    }
                }
            }
        }
        if (get_parent_class() == ""){
            return $values;
        }
        else{
            return array_merge(parent::jsonSerialize(), $values);
        }
    }
    
    // Json Set Code
    public function set($data)
    {
        $mapper = \net\authorize\util\Mapper::Instance();
        foreach($data AS $key => $value) {
            $classDetails = $mapper->getClass(get_class() , $key);
 
            if($classDetails !== NULL ) {
                if ($classDetails->isArray) {
                    if ($classDetails->isCustomDefined) {
                        foreach($value AS $keyChild => $valueChild) {
                            $type = new $classDetails->className;
                            $type->set($valueChild);
                            $this->{'addTo' . $key}($type);
                        }
                    }
                    else if ($classDetails->className === 'DateTime' || $classDetails->className === 'Date' ) {
                        foreach($value AS $keyChild => $valueChild) {
                            $type = new \DateTime($valueChild);
                            $this->{'addTo' . $key}($type);
                        }
                    }
                    else {
                        foreach($value AS $keyChild => $valueChild) {
                            $this->{'addTo' . $key}($valueChild);
                        }
                    }
                }
                else {
                    if ($classDetails->isCustomDefined){
                        $type = new $classDetails->className;
                        $type->set($value);
                        $this->{'set' . $key}($type);
                    }
                    else if ($classDetails->className === 'DateTime' || $classDetails->className === 'Date' ) {
                        $type = new \DateTime($value);
                        $this->{'set' . $key}($type);
                    }
                    else {
                        $this->{'set' . $key}($value);
                    }
                }
            }
        }
    }
    
}

