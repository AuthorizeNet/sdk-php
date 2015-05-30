<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing SettingType
 *
 *
 * XSD Type: settingType
 */
class SettingType
{

    /**
     * @property string $settingName
     */
    private $settingName = null;

    /**
     * @property string $settingValue
     */
    private $settingValue = null;

    /**
     * Gets as settingName
     *
     * @return string
     */
    public function getSettingName()
    {
        return $this->settingName;
    }

    /**
     * Sets a new settingName
     *
     * @param string $settingName
     * @return self
     */
    public function setSettingName($settingName)
    {
        $this->settingName = $settingName;
        return $this;
    }

    /**
     * Gets as settingValue
     *
     * @return string
     */
    public function getSettingValue()
    {
        return $this->settingValue;
    }

    /**
     * Sets a new settingValue
     *
     * @param string $settingValue
     * @return self
     */
    public function setSettingValue($settingValue)
    {
        $this->settingValue = $settingValue;
        return $this;
    }


}

