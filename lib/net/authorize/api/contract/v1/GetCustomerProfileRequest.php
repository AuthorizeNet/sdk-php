<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerProfileRequest
 */
class GetCustomerProfileRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string $merchantCustomerId
     */
    private $merchantCustomerId = null;

    /**
     * @property string $email
     */
    private $email = null;

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
     * Gets as merchantCustomerId
     *
     * @return string
     */
    public function getMerchantCustomerId()
    {
        return $this->merchantCustomerId;
    }

    /**
     * Sets a new merchantCustomerId
     *
     * @param string $merchantCustomerId
     * @return self
     */
    public function setMerchantCustomerId($merchantCustomerId)
    {
        $this->merchantCustomerId = $merchantCustomerId;
        return $this;
    }

    /**
     * Gets as email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets a new email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
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


}

