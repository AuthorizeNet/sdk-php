<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateCustomerProfileFromTransactionRequest
 */
class CreateCustomerProfileFromTransactionRequest extends ANetApiRequestType
{

    /**
     * @property string $transId
     */
    private $transId = null;

    /**
     * Gets as transId
     *
     * @return string
     */
    public function getTransId()
    {
        return $this->transId;
    }

    /**
     * Sets a new transId
     *
     * @param string $transId
     * @return self
     */
    public function setTransId($transId)
    {
        $this->transId = $transId;
        return $this;
    }


}

