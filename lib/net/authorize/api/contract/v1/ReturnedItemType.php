<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ReturnedItemType
 *
 * 
 * XSD Type: returnedItemType
 */
class ReturnedItemType
{

    /**
     * @property string $id
     */
    private $id = null;

    /**
     * @property \DateTime $dateUTC
     */
    private $dateUTC = null;

    /**
     * @property \DateTime $dateLocal
     */
    private $dateLocal = null;

    /**
     * @property string $code
     */
    private $code = null;

    /**
     * @property string $description
     */
    private $description = null;

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
     * Gets as dateUTC
     *
     * @return \DateTime
     */
    public function getDateUTC()
    {
        return $this->dateUTC;
    }

    /**
     * Sets a new dateUTC
     *
     * @param \DateTime $dateUTC
     * @return self
     */
    public function setDateUTC(\DateTime $dateUTC)
    {
        $this->dateUTC = $dateUTC;
        return $this;
    }

    /**
     * Gets as dateLocal
     *
     * @return \DateTime
     */
    public function getDateLocal()
    {
        return $this->dateLocal;
    }

    /**
     * Sets a new dateLocal
     *
     * @param \DateTime $dateLocal
     * @return self
     */
    public function setDateLocal(\DateTime $dateLocal)
    {
        $this->dateLocal = $dateLocal;
        return $this;
    }

    /**
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


}

