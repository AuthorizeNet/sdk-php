<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing OpaqueDataType
 *
 * 
 * XSD Type: opaqueDataType
 */
class OpaqueDataType
{

    /**
     * @property string $dataDescriptor
     */
    private $dataDescriptor = null;

    /**
     * @property string $dataValue
     */
    private $dataValue = null;

    /**
     * Gets as dataDescriptor
     *
     * @return string
     */
    public function getDataDescriptor()
    {
        return $this->dataDescriptor;
    }

    /**
     * Sets a new dataDescriptor
     *
     * @param string $dataDescriptor
     * @return self
     */
    public function setDataDescriptor($dataDescriptor)
    {
        $this->dataDescriptor = $dataDescriptor;
        return $this;
    }

    /**
     * Gets as dataValue
     *
     * @return string
     */
    public function getDataValue()
    {
        return $this->dataValue;
    }

    /**
     * Sets a new dataValue
     *
     * @param string $dataValue
     * @return self
     */
    public function setDataValue($dataValue)
    {
        $this->dataValue = $dataValue;
        return $this;
    }


}

