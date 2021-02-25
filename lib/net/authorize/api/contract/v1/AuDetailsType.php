<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing AuDetailsType
 *
 * 
 * XSD Type: auDetailsType
 */
class AuDetailsType implements \JsonSerializable
{

    /**
     * @property integer $customerProfileID
     */
    private $customerProfileID = null;

    /**
     * @property integer $customerPaymentProfileID
     */
    private $customerPaymentProfileID = null;

    /**
     * @property string $firstName
     */
    private $firstName = null;

    /**
     * @property string $lastName
     */
    private $lastName = null;

    /**
     * @property string $updateTimeUTC
     */
    private $updateTimeUTC = null;

    /**
     * @property string $auReasonCode
     */
    private $auReasonCode = null;

    /**
     * @property string $reasonDescription
     */
    private $reasonDescription = null;

    /**
     * Gets as customerProfileID
     *
     * @return integer
     */
    public function getCustomerProfileID()
    {
        return $this->customerProfileID;
    }

    /**
     * Sets a new customerProfileID
     *
     * @param integer $customerProfileID
     * @return self
     */
    public function setCustomerProfileID($customerProfileID)
    {
        $this->customerProfileID = $customerProfileID;
        return $this;
    }

    /**
     * Gets as customerPaymentProfileID
     *
     * @return integer
     */
    public function getCustomerPaymentProfileID()
    {
        return $this->customerPaymentProfileID;
    }

    /**
     * Sets a new customerPaymentProfileID
     *
     * @param integer $customerPaymentProfileID
     * @return self
     */
    public function setCustomerPaymentProfileID($customerPaymentProfileID)
    {
        $this->customerPaymentProfileID = $customerPaymentProfileID;
        return $this;
    }

    /**
     * Gets as firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets a new firstName
     *
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Gets as lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets a new lastName
     *
     * @param string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Gets as updateTimeUTC
     *
     * @return string
     */
    public function getUpdateTimeUTC()
    {
        return $this->updateTimeUTC;
    }

    /**
     * Sets a new updateTimeUTC
     *
     * @param string $updateTimeUTC
     * @return self
     */
    public function setUpdateTimeUTC($updateTimeUTC)
    {
        $this->updateTimeUTC = $updateTimeUTC;
        return $this;
    }

    /**
     * Gets as auReasonCode
     *
     * @return string
     */
    public function getAuReasonCode()
    {
        return $this->auReasonCode;
    }

    /**
     * Sets a new auReasonCode
     *
     * @param string $auReasonCode
     * @return self
     */
    public function setAuReasonCode($auReasonCode)
    {
        $this->auReasonCode = $auReasonCode;
        return $this;
    }

    /**
     * Gets as reasonDescription
     *
     * @return string
     */
    public function getReasonDescription()
    {
        return $this->reasonDescription;
    }

    /**
     * Sets a new reasonDescription
     *
     * @param string $reasonDescription
     * @return self
     */
    public function setReasonDescription($reasonDescription)
    {
        $this->reasonDescription = $reasonDescription;
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
        return $values;
    }
    
    // Json Set Code
    public function set($data)
    {
        if(is_array($data) || is_object($data)) {
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
    
}

