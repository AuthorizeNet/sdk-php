<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing EmvTagType
 *
 * 
 * XSD Type: emvTag
 */
class EmvTagType
{

    /**
     * @property string $name
     */
    private $name = null;

    /**
     * @property string $value
     */
    private $value = null;

    /**
     * @property string $formatted
     */
    private $formatted = null;

    /**
     * Gets as name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

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

    /**
     * Gets as formatted
     *
     * @return string
     */
    public function getFormatted()
    {
        return $this->formatted;
    }

    /**
     * Sets a new formatted
     *
     * @param string $formatted
     * @return self
     */
    public function setFormatted($formatted)
    {
        $this->formatted = $formatted;
        return $this;
    }


}

