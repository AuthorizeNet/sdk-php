<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ValidateCustomerPaymentProfileResponse
 */
class ValidateCustomerPaymentProfileResponse extends ANetApiResponseType
{

    /**
     * @property string $directResponse
     */
    private $directResponse = null;

    /**
     * Gets as directResponse
     *
     * @return string
     */
    public function getDirectResponse()
    {
        return $this->directResponse;
    }

    /**
     * Sets a new directResponse
     *
     * @param string $directResponse
     * @return self
     */
    public function setDirectResponse($directResponse)
    {
        $this->directResponse = $directResponse;
        return $this;
    }


}

