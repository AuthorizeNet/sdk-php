<?php

namespace net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType;

/**
 * Class representing EncryptedDataAType
 */
class EncryptedDataAType
{

    /**
     * @property string $value
     */
    private $value = null;

    /**
     * Gets as value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets a new value
     *
     * @param string $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


}

