<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateTransactionResponse
 */
class CreateTransactionResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     */
    private $transactionResponse = null;

    /**
     * @property \net\authorize\api\contract\v1\CreateProfileResponseType
     * $profileResponse
     */
    private $profileResponse = null;

    /**
     * Gets as transactionResponse
     *
     * @return \net\authorize\api\contract\v1\TransactionResponseType
     */
    public function getTransactionResponse()
    {
        return $this->transactionResponse;
    }

    /**
     * Sets a new transactionResponse
     *
     * @param \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     * @return self
     */
    public function setTransactionResponse(\net\authorize\api\contract\v1\TransactionResponseType $transactionResponse)
    {
        $this->transactionResponse = $transactionResponse;
        return $this;
    }

    /**
     * Gets as profileResponse
     *
     * @return \net\authorize\api\contract\v1\CreateProfileResponseType
     */
    public function getProfileResponse()
    {
        return $this->profileResponse;
    }

    /**
     * Sets a new profileResponse
     *
     * @param \net\authorize\api\contract\v1\CreateProfileResponseType $profileResponse
     * @return self
     */
    public function setProfileResponse(\net\authorize\api\contract\v1\CreateProfileResponseType $profileResponse)
    {
        $this->profileResponse = $profileResponse;
        return $this;
    }


}

