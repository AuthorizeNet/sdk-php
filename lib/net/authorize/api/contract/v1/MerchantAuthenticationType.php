<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MerchantAuthenticationType
 *
 *
 * XSD Type: merchantAuthenticationType
 */
class MerchantAuthenticationType
{

    /**
     * @property string $name
     */
    private $name = null;

    /**
     * @property string $transactionKey
     */
    private $transactionKey = null;

    /**
     * @property string $sessionToken
     */
    private $sessionToken = null;

    /**
     * @property string $password
     */
    private $password = null;

    /**
     * @property \net\authorize\api\contract\v1\ImpersonationAuthenticationType
     * $impersonationAuthentication
     */
    private $impersonationAuthentication = null;

    /**
     * @property \net\authorize\api\contract\v1\FingerPrintType $fingerPrint
     */
    private $fingerPrint = null;

    /**
     * @property string $mobileDeviceId
     */
    private $mobileDeviceId = null;

    /**
     * Gets as name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as transactionKey
     *
     * @return string
     */
    public function getTransactionKey()
    {
        return $this->transactionKey;
    }

    /**
     * Sets a new transactionKey
     *
     * @param string $transactionKey
     * @return self
     */
    public function setTransactionKey($transactionKey)
    {
        $this->transactionKey = $transactionKey;
        return $this;
    }

    /**
     * Gets as sessionToken
     *
     * @return string
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }

    /**
     * Sets a new sessionToken
     *
     * @param string $sessionToken
     * @return self
     */
    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
        return $this;
    }

    /**
     * Gets as password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets a new password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Gets as impersonationAuthentication
     *
     * @return \net\authorize\api\contract\v1\ImpersonationAuthenticationType
     */
    public function getImpersonationAuthentication()
    {
        return $this->impersonationAuthentication;
    }

    /**
     * Sets a new impersonationAuthentication
     *
     * @param \net\authorize\api\contract\v1\ImpersonationAuthenticationType
     * $impersonationAuthentication
     * @return self
     */
    public function setImpersonationAuthentication(\net\authorize\api\contract\v1\ImpersonationAuthenticationType $impersonationAuthentication)
    {
        $this->impersonationAuthentication = $impersonationAuthentication;
        return $this;
    }

    /**
     * Gets as fingerPrint
     *
     * @return \net\authorize\api\contract\v1\FingerPrintType
     */
    public function getFingerPrint()
    {
        return $this->fingerPrint;
    }

    /**
     * Sets a new fingerPrint
     *
     * @param \net\authorize\api\contract\v1\FingerPrintType $fingerPrint
     * @return self
     */
    public function setFingerPrint(\net\authorize\api\contract\v1\FingerPrintType $fingerPrint)
    {
        $this->fingerPrint = $fingerPrint;
        return $this;
    }

    /**
     * Gets as mobileDeviceId
     *
     * @return string
     */
    public function getMobileDeviceId()
    {
        return $this->mobileDeviceId;
    }

    /**
     * Sets a new mobileDeviceId
     *
     * @param string $mobileDeviceId
     * @return self
     */
    public function setMobileDeviceId($mobileDeviceId)
    {
        $this->mobileDeviceId = $mobileDeviceId;
        return $this;
    }


}

