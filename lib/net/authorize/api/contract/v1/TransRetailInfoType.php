<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing TransRetailInfoType
 *
 *
 * XSD Type: transRetailInfoType
 */
class TransRetailInfoType
{

    /**
     * @property string $marketType
     */
    private $marketType = null;

    /**
     * @property string $deviceType
     */
    private $deviceType = null;

    /**
     * Gets as marketType
     *
     * @return string
     */
    public function getMarketType()
    {
        return $this->marketType;
    }

    /**
     * Sets a new marketType
     *
     * @param string $marketType
     * @return self
     */
    public function setMarketType($marketType)
    {
        $this->marketType = $marketType;
        return $this;
    }

    /**
     * Gets as deviceType
     *
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * Sets a new deviceType
     *
     * @param string $deviceType
     * @return self
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;
        return $this;
    }


}

