<?php

namespace net\authorize\api\contract\v1\KeyManagementSchemeType;

/**
 * Class representing DUKPTAType
 */
class DUKPTAType
{

    /**
     * @property string $operation
     */
    private $operation = null;

    /**
     * @property
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType
     * $mode
     */
    private $mode = null;

    /**
     * @property
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType
     * $deviceInfo
     */
    private $deviceInfo = null;

    /**
     * @property
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType
     * $encryptedData
     */
    private $encryptedData = null;

    /**
     * Gets as operation
     *
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Sets a new operation
     *
     * @param string $operation
     * @return self
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * Gets as mode
     *
     * @return
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Sets a new mode
     *
     * @param
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType
     * $mode
     * @return self
     */
    public function setMode(\net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType $mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * Gets as deviceInfo
     *
     * @return
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType
     */
    public function getDeviceInfo()
    {
        return $this->deviceInfo;
    }

    /**
     * Sets a new deviceInfo
     *
     * @param
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType
     * $deviceInfo
     * @return self
     */
    public function setDeviceInfo(\net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType $deviceInfo)
    {
        $this->deviceInfo = $deviceInfo;
        return $this;
    }

    /**
     * Gets as encryptedData
     *
     * @return
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType
     */
    public function getEncryptedData()
    {
        return $this->encryptedData;
    }

    /**
     * Sets a new encryptedData
     *
     * @param
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType
     * $encryptedData
     * @return self
     */
    public function setEncryptedData(\net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType $encryptedData)
    {
        $this->encryptedData = $encryptedData;
        return $this;
    }


}

