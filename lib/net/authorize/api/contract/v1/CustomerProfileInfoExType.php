<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CustomerProfileInfoExType
 *
 * 
 * XSD Type: customerProfileInfoExType
 */
class CustomerProfileInfoExType extends CustomerProfileExType
{

    /**
     * @property string $profileType
     */
    private $profileType = null;

    /**
     * Gets as profileType
     *
     * @return string
     */
    public function getProfileType()
    {
        return $this->profileType;
    }

    /**
     * Sets a new profileType
     *
     * @param string $profileType
     * @return self
     */
    public function setProfileType($profileType)
    {
        $this->profileType = $profileType;
        return $this;
    }


}

