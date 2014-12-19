<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing DriversLicenseType
 *
 * 
 * XSD Type: driversLicenseType
 */
class DriversLicenseType
{

    /**
     * @property string $number
     */
    private $number = null;

    /**
     * @property string $state
     */
    private $state = null;

    /**
     * @property string $dateOfBirth
     */
    private $dateOfBirth = null;

    /**
     * Gets as number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number
     *
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Gets as state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets a new state
     *
     * @param string $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Gets as dateOfBirth
     *
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Sets a new dateOfBirth
     *
     * @param string $dateOfBirth
     * @return self
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }


}

