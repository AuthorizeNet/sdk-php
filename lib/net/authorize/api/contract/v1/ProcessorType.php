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
     * @property integer $id
     */
    private $id = null;

    /**
     * @property string[] $cardTypes
     */
    private $cardTypes = null;

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
     * Gets as id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * @param integer $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Adds as cardType
     *
     * @return self
     * @param string $cardType
     */
    public function addToCardTypes($cardType)
    {
        $this->cardTypes[] = $cardType;
        return $this;
    }

    /**
     * isset cardTypes
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetCardTypes($index)
    {
        return isset($this->cardTypes[$index]);
    }

    /**
     * unset cardTypes
     *
     * @param scalar $index
     * @return void
     */
    public function unsetCardTypes($index)
    {
        unset($this->cardTypes[$index]);
    }

    /**
     * Gets as cardTypes
     *
     * @return string[]
     */
    public function getCardTypes()
    {
        return $this->cardTypes;
    }

    /**
     * Sets a new cardTypes
     *
     * @param string[] $cardTypes
     * @return self
     */
    public function setCardTypes(array $cardTypes)
    {
        $this->cardTypes = $cardTypes;
        return $this;
    }


}

