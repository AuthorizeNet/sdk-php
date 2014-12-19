<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerProfileResponse
 */
class GetCustomerProfileResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerProfileMaskedType $profile
     */
    private $profile = null;

    /**
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\CustomerProfileMaskedType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\CustomerProfileMaskedType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\CustomerProfileMaskedType $profile)
    {
        $this->profile = $profile;
        return $this;
    }


}

