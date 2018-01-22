<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateHeldTransactionRequest
 */
class UpdateHeldTransactionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\HeldTransactionRequestType
     * $heldTransactionRequest
     */
    private $heldTransactionRequest = null;

    /**
     * Gets as heldTransactionRequest
     *
     * @return \net\authorize\api\contract\v1\HeldTransactionRequestType
     */
    public function getHeldTransactionRequest()
    {
        return $this->heldTransactionRequest;
    }

    /**
     * Sets a new heldTransactionRequest
     *
     * @param \net\authorize\api\contract\v1\HeldTransactionRequestType
     * $heldTransactionRequest
     * @return self
     */
    public function setHeldTransactionRequest(\net\authorize\api\contract\v1\HeldTransactionRequestType $heldTransactionRequest)
    {
        $this->heldTransactionRequest = $heldTransactionRequest;
        return $this;
    }


}

