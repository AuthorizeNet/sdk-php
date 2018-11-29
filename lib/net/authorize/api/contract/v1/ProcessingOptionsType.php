<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ProcessingOptionsType
 *
 * 
 * XSD Type: processingOptions
 */
class ProcessingOptionsType
{

    /**
     * @property boolean $isFirstRecurringPayment
     */
    private $isFirstRecurringPayment = null;

    /**
     * @property boolean $isFirstSubsequentAuth
     */
    private $isFirstSubsequentAuth = null;

    /**
     * @property boolean $isSubsequentAuth
     */
    private $isSubsequentAuth = null;

    /**
     * @property boolean $isStoredCredentials
     */
    private $isStoredCredentials = null;

    /**
     * Gets as isFirstRecurringPayment
     *
     * @return boolean
     */
    public function getIsFirstRecurringPayment()
    {
        return $this->isFirstRecurringPayment;
    }

    /**
     * Sets a new isFirstRecurringPayment
     *
     * @param boolean $isFirstRecurringPayment
     * @return self
     */
    public function setIsFirstRecurringPayment($isFirstRecurringPayment)
    {
        $this->isFirstRecurringPayment = $isFirstRecurringPayment;
        return $this;
    }

    /**
     * Gets as isFirstSubsequentAuth
     *
     * @return boolean
     */
    public function getIsFirstSubsequentAuth()
    {
        return $this->isFirstSubsequentAuth;
    }

    /**
     * Sets a new isFirstSubsequentAuth
     *
     * @param boolean $isFirstSubsequentAuth
     * @return self
     */
    public function setIsFirstSubsequentAuth($isFirstSubsequentAuth)
    {
        $this->isFirstSubsequentAuth = $isFirstSubsequentAuth;
        return $this;
    }

    /**
     * Gets as isSubsequentAuth
     *
     * @return boolean
     */
    public function getIsSubsequentAuth()
    {
        return $this->isSubsequentAuth;
    }

    /**
     * Sets a new isSubsequentAuth
     *
     * @param boolean $isSubsequentAuth
     * @return self
     */
    public function setIsSubsequentAuth($isSubsequentAuth)
    {
        $this->isSubsequentAuth = $isSubsequentAuth;
        return $this;
    }

    /**
     * Gets as isStoredCredentials
     *
     * @return boolean
     */
    public function getIsStoredCredentials()
    {
        return $this->isStoredCredentials;
    }

    /**
     * Sets a new isStoredCredentials
     *
     * @param boolean $isStoredCredentials
     * @return self
     */
    public function setIsStoredCredentials($isStoredCredentials)
    {
        $this->isStoredCredentials = $isStoredCredentials;
        return $this;
    }


}

