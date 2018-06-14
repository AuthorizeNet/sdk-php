<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MobileDeviceType
 *
 * 
 * XSD Type: mobileDeviceType
 */
class MobileDeviceType
{

    /**
     * @property string $mobileDeviceId
     */
    private $mobileDeviceId = null;

    /**
     * @property string $description
     */
    private $description = null;

    /**
     * @property string $phoneNumber
     */
    private $phoneNumber = null;

    /**
     * @property string $devicePlatform
     */
    private $devicePlatform = null;

    /**
     * @property string $deviceActivation
     */
    private $deviceActivation = null;

    /**
     * Gets as mobileDeviceId
     *
     * @return string
     */
    public function getMobileDeviceId()
    {
        return $this->mobileDeviceId;
    }

    /**
     * Sets a new mobileDeviceId
     *
     * @param string $mobileDeviceId
     * @return self
     */
    public function setMobileDeviceId($mobileDeviceId)
    {
        $this->mobileDeviceId = $mobileDeviceId;
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
     * Gets as devicePlatform
     *
     * @return string
     */
    public function getDevicePlatform()
    {
        return $this->devicePlatform;
    }

    /**
     * Sets a new devicePlatform
     *
     * @param string $devicePlatform
     * @return self
     */
    public function setDevicePlatform($devicePlatform)
    {
        $this->devicePlatform = $devicePlatform;
        return $this;
    }

    /**
     * Gets as deviceActivation
     *
     * @return string
     */
    public function getDeviceActivation()
    {
        return $this->deviceActivation;
    }

    /**
     * Sets a new deviceActivation
     *
     * @param string $deviceActivation
     * @return self
     */
    public function setDeviceActivation($deviceActivation)
    {
        $this->deviceActivation = $deviceActivation;
        return $this;
    }


}

