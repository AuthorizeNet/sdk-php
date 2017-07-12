<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerPaymentProfileRequest
 */
class GetCustomerPaymentProfileRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

    /**
     * @property boolean $unmaskExpirationDate
     */
    private $unmaskExpirationDate = null;

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
     * Gets as customerPaymentProfileId
     *
     * @return string
     */
    public function getCustomerPaymentProfileId()
    {
        return $this->customerPaymentProfileId;
    }

    /**
     * Sets a new customerPaymentProfileId
     *
     * @param string $customerPaymentProfileId
     * @return self
     */
    public function setCustomerPaymentProfileId($customerPaymentProfileId)
    {
        $this->customerPaymentProfileId = $customerPaymentProfileId;
        return $this;
    }

    /**
     * Gets as unmaskExpirationDate
     *
     * @return boolean
     */
    public function getUnmaskExpirationDate()
    {
        return $this->unmaskExpirationDate;
    }

    /**
     * Sets a new unmaskExpirationDate
     *
     * @param boolean $unmaskExpirationDate
     * @return self
     */
    public function setUnmaskExpirationDate($unmaskExpirationDate)
    {
        $this->unmaskExpirationDate = $unmaskExpirationDate;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

