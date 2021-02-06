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
     * @property boolean $includeIssuerInfo
     */
    private $includeIssuerInfo = null;

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

    /**
     * Gets as includeIssuerInfo
     *
     * @return boolean
     */
    public function getIncludeIssuerInfo()
    {
        return $this->includeIssuerInfo;
    }

    /**
     * Sets a new includeIssuerInfo
     *
     * @param boolean $includeIssuerInfo
     * @return self
     */
    public function setIncludeIssuerInfo($includeIssuerInfo)
    {
        $this->includeIssuerInfo = $includeIssuerInfo;
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

        return array_merge(parent::jsonSerialize(), $values);
    }
}

