<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateCustomerProfileRequest
 */
class UpdateCustomerProfileRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerProfileInfoExType $profile
     */
    private $profile = null;

    /**
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\CustomerProfileInfoExType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\CustomerProfileInfoExType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\CustomerProfileInfoExType $profile)
    {
        $this->profile = $profile;
        return $this;
    }


}

