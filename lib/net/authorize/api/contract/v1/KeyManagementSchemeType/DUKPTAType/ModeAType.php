<?php

namespace net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType;

/**
 * Class representing ModeAType
 */
class ModeAType
{

    /**
     * @property string $pIN
     */
    private $pIN = null;

    /**
     * @property string $data
     */
    private $data = null;

    /**
     * Gets as pIN
     *
     * @return string
     */
    public function getPIN()
    {
        return $this->pIN;
    }

    /**
     * Sets a new pIN
     *
     * @param string $pIN
     * @return self
     */
    public function setPIN($pIN)
    {
        $this->pIN = $pIN;
        return $this;
    }

    /**
     * Gets as data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets a new data
     *
     * @param string $data
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }


}

