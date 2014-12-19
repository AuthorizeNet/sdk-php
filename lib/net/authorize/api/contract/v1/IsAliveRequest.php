<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing IsAliveRequest
 */
class IsAliveRequest
{

    /**
     * @property string $refId
     */
    private $refId = null;

    /**
     * Gets as refId
     *
     * @return string
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Sets a new refId
     *
     * @param string $refId
     * @return self
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;
        return $this;
    }


}

