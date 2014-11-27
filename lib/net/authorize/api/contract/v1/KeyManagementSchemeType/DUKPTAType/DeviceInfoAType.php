<?php

namespace net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType;

/**
 * Class representing DeviceInfoAType
 */
class DeviceInfoAType
{

    /**
     * @property string $description
     */
    private $description = null;

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


}

