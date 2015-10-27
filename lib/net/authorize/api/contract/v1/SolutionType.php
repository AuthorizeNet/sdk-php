<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing SolutionType
 *
 *
 * XSD Type: solutionType
 */
class SolutionType
{

    /**
     * @property string $id
     */
    private $id = null;

    /**
     * @property string $name
     */
    private $name = null;

    /**
     * Gets as id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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

