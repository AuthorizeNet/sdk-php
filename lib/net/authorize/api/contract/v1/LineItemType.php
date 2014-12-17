<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing LineItemType
 *
 * 
 * XSD Type: lineItemType
 */
class LineItemType
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


}

