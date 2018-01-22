<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ArrayOfSettingType
 *
 *
 * XSD Type: ArrayOfSetting
 */
class ArrayOfSettingType
{

    /**
     * @property \net\authorize\api\contract\v1\SettingType[] $setting
     */
    private $setting = null;

    /**
     * Adds as setting
     *
     * @return self
     * @param \net\authorize\api\contract\v1\SettingType $setting
     */
    public function addToSetting(\net\authorize\api\contract\v1\SettingType $setting)
    {
        $this->setting[] = $setting;
        return $this;
    }

    /**
     * isset setting
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetSetting($index)
    {
        return isset($this->setting[$index]);
    }

    /**
     * unset setting
     *
     * @param scalar $index
     * @return void
     */
    public function unsetSetting($index)
    {
        unset($this->setting[$index]);
    }

    /**
     * Gets as setting
     *
     * @return \net\authorize\api\contract\v1\SettingType[]
     */
    public function getSetting()
    {
        return $this->setting;
    }

    /**
     * Sets a new setting
     *
     * @param \net\authorize\api\contract\v1\SettingType[] $setting
     * @return self
     */
    public function setSetting(array $setting)
    {
        $this->setting = $setting;
        return $this;
    }


}

