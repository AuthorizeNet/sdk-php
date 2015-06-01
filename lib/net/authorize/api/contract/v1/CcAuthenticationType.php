<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CcAuthenticationType
 *
 *
 * XSD Type: ccAuthenticationType
 */
class CcAuthenticationType
{

    /**
     * @property string $authenticationIndicator
     */
    private $authenticationIndicator = null;

    /**
     * @property string $cardholderAuthenticationValue
     */
    private $cardholderAuthenticationValue = null;

    /**
     * Gets as authenticationIndicator
     *
     * @return string
     */
    public function getAuthenticationIndicator()
    {
        return $this->authenticationIndicator;
    }

    /**
     * Sets a new authenticationIndicator
     *
     * @param string $authenticationIndicator
     * @return self
     */
    public function setAuthenticationIndicator($authenticationIndicator)
    {
        $this->authenticationIndicator = $authenticationIndicator;
        return $this;
    }

    /**
     * Gets as cardholderAuthenticationValue
     *
     * @return string
     */
    public function getCardholderAuthenticationValue()
    {
        return $this->cardholderAuthenticationValue;
    }

    /**
     * Sets a new cardholderAuthenticationValue
     *
     * @param string $cardholderAuthenticationValue
     * @return self
     */
    public function setCardholderAuthenticationValue($cardholderAuthenticationValue)
    {
        $this->cardholderAuthenticationValue = $cardholderAuthenticationValue;
        return $this;
    }


}

