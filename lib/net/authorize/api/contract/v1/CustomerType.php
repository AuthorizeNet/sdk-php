<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerType
 *
 *
 * XSD Type: customerType
 */
class CustomerType
{

    /**
     * @property string $type
     */
    private $type = null;

    /**
     * @property string $id
     */
    private $id = null;

    /**
     * @property string $email
     */
    private $email = null;

    /**
     * @property string $phoneNumber
     */
    private $phoneNumber = null;

    /**
     * @property string $faxNumber
     */
    private $faxNumber = null;

    /**
     * @property \net\authorize\api\contract\v1\DriversLicenseType $driversLicense
     */
    private $driversLicense = null;

    /**
     * @property string $taxId
     */
    private $taxId = null;

    /**
     * Gets as type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

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
     * Gets as phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets a new phoneNumber
     *
     * @param string $phoneNumber
     * @return self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Gets as faxNumber
     *
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Sets a new faxNumber
     *
     * @param string $faxNumber
     * @return self
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * Gets as driversLicense
     *
     * @return \net\authorize\api\contract\v1\DriversLicenseType
     */
    public function getDriversLicense()
    {
        return $this->driversLicense;
    }

    /**
     * Sets a new driversLicense
     *
     * @param \net\authorize\api\contract\v1\DriversLicenseType $driversLicense
     * @return self
     */
    public function setDriversLicense(\net\authorize\api\contract\v1\DriversLicenseType $driversLicense)
    {
        $this->driversLicense = $driversLicense;
        return $this;
    }

    /**
     * Gets as taxId
     *
     * @return string
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * Sets a new taxId
     *
     * @param string $taxId
     * @return self
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
        return $this;
    }


}

