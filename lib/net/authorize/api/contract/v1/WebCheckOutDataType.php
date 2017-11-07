<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing WebCheckOutDataType
 *
 * 
 * XSD Type: webCheckOutDataType
 */
class WebCheckOutDataType
{

    /**
     * @property string $type
     */
    private $type = null;

    /**
     * @property string $id
     */
    private $id = null;

    /**
     * @property \net\authorize\api\contract\v1\WebCheckOutDataType\TokenAType $token
     */
    private $token = null;

    /**
     * Gets as type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

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
     * Gets as token
     *
     * @return \net\authorize\api\contract\v1\WebCheckOutDataType\TokenAType
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets a new token
     *
     * @param \net\authorize\api\contract\v1\WebCheckOutDataType\TokenAType $token
     * @return self
     */
    public function setToken(\net\authorize\api\contract\v1\WebCheckOutDataType\TokenAType $token)
    {
        $this->token = $token;
        return $this;
    }


}

