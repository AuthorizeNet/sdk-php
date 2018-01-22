<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ProcessorType
 *
 *
 * XSD Type: processorType
 */
class ProcessorType
{

    /**
     * @property string $name
     */
    private $name = null;

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


}

