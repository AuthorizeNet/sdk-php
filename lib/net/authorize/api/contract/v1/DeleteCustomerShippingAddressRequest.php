<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing DeleteCustomerShippingAddressRequest
 */
class DeleteCustomerShippingAddressRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string $customerAddressId
     */
    private $customerAddressId = null;

    /**
     * Gets as customerProfileId
     *
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * Sets a new customerProfileId
     *
     * @param string $customerProfileId
     * @return self
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    /**
     * Gets as customerAddressId
     *
     * @return string
     */
    public function getCustomerAddressId()
    {
        return $this->customerAddressId;
    }

    /**
     * Sets a new customerAddressId
     *
     * @param string $customerAddressId
     * @return self
     */
    public function setCustomerAddressId($customerAddressId)
    {
        $this->customerAddressId = $customerAddressId;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

