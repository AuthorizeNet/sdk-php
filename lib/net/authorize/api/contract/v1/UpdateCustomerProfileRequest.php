<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateCustomerProfileRequest
 */
class UpdateCustomerProfileRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerProfileExType $profile
     */
    private $profile = null;

    /**
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\CustomerProfileExType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\CustomerProfileExType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\CustomerProfileExType $profile)
    {
        $this->profile = $profile;
        return $this;
    }


}

