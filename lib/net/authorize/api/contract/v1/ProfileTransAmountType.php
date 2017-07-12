<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ProfileTransAmountType
 *
 *
 * XSD Type: profileTransAmountType
 */
class ProfileTransAmountType implements \JsonSerializable
{

    /**
     * @property float $amount
     */
    private $amount = null;

    /**
     * @property \net\authorize\api\contract\v1\ExtendedAmountType $tax
     */
    private $tax = null;

    /**
     * @property \net\authorize\api\contract\v1\ExtendedAmountType $shipping
     */
    private $shipping = null;

    /**
     * @property \net\authorize\api\contract\v1\ExtendedAmountType $duty
     */
    private $duty = null;

    /**
     * @property \net\authorize\api\contract\v1\LineItemType[] $lineItems
     */
    private $lineItems = null;

    /**
     * Gets as amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as tax
     *
     * @return \net\authorize\api\contract\v1\ExtendedAmountType
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * @param \net\authorize\api\contract\v1\ExtendedAmountType $tax
     * @return self
     */
    public function setTax(\net\authorize\api\contract\v1\ExtendedAmountType $tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Gets as shipping
     *
     * @return \net\authorize\api\contract\v1\ExtendedAmountType
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Sets a new shipping
     *
     * @param \net\authorize\api\contract\v1\ExtendedAmountType $shipping
     * @return self
     */
    public function setShipping(\net\authorize\api\contract\v1\ExtendedAmountType $shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Gets as duty
     *
     * @return \net\authorize\api\contract\v1\ExtendedAmountType
     */
    public function getDuty()
    {
        return $this->duty;
    }

    /**
     * Sets a new duty
     *
     * @param \net\authorize\api\contract\v1\ExtendedAmountType $duty
     * @return self
     */
    public function setDuty(\net\authorize\api\contract\v1\ExtendedAmountType $duty)
    {
        $this->duty = $duty;
        return $this;
    }

    /**
     * Adds as lineItems
     *
     * @return self
     * @param \net\authorize\api\contract\v1\LineItemType $lineItems
     */
    public function addToLineItems(\net\authorize\api\contract\v1\LineItemType $lineItems)
    {
        $this->lineItems[] = $lineItems;
        return $this;
    }

    /**
     * isset lineItems
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetLineItems($index)
    {
        return isset($this->lineItems[$index]);
    }

    /**
     * unset lineItems
     *
     * @param scalar $index
     * @return void
     */
    public function unsetLineItems($index)
    {
        unset($this->lineItems[$index]);
    }

    /**
     * Gets as lineItems
     *
     * @return \net\authorize\api\contract\v1\LineItemType[]
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * Sets a new lineItems
     *
     * @param \net\authorize\api\contract\v1\LineItemType[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

