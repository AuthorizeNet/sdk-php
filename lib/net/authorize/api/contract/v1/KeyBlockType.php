<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing KeyBlockType
 *
 *
 * XSD Type: KeyBlock
 */
class KeyBlockType
{

    /**
     * @property \net\authorize\api\contract\v1\KeyValueType $value
     */
    private $value = null;

    /**
     * Gets as value
     *
     * @return \net\authorize\api\contract\v1\KeyValueType
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets a new value
     *
     * @param \net\authorize\api\contract\v1\KeyValueType $value
     * @return self
     */
    public function setValue(\net\authorize\api\contract\v1\KeyValueType $value)
    {
        $this->value = $value;
        return $this;
    }


}

