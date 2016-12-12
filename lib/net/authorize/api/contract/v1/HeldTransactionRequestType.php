<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing HeldTransactionRequestType
 *
 *
 * XSD Type: heldTransactionRequestType
 */
class HeldTransactionRequestType
{

    /**
     * @property string $action
     */
    private $action = null;

    /**
     * @property string $refTransId
     */
    private $refTransId = null;

    /**
     * Gets as action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets a new action
     *
     * @param string $action
     * @return self
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Gets as refTransId
     *
     * @return string
     */
    public function getRefTransId()
    {
        return $this->refTransId;
    }

    /**
     * Sets a new refTransId
     *
     * @param string $refTransId
     * @return self
     */
    public function setRefTransId($refTransId)
    {
        $this->refTransId = $refTransId;
        return $this;
    }


}

