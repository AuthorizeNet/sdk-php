<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing EmailSettingsType
 *
 * Allowed values for settingName are: headerEmailReceipt and footerEmailReceipt
 * XSD Type: emailSettingsType
 */
class EmailSettingsType extends ArrayOfSettingType
{

    /**
     * @property integer $version
     */
    private $version = null;

    /**
     * Gets as version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets a new version
     *
     * @param integer $version
     * @return self
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }


}

