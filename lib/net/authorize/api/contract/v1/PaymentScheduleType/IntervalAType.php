<?php

namespace net\authorize\api\contract\v1\PaymentScheduleType;

/**
 * Class representing IntervalAType
 */
class IntervalAType
{

    /**
     * @property integer $length
     */
    private $length = null;

    /**
     * @property string $unit
     */
    private $unit = null;

    /**
     * Gets as length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Sets a new length
     *
     * @param integer $length
     * @return self
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Gets as unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Sets a new unit
     *
     * @param string $unit
     * @return self
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }


}

