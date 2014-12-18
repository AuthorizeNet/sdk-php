<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing SecureAcceptanceAType
 */
class SecureAcceptanceAType
{

    /**
     * @property string $secureAcceptanceUrl
     */
    private $secureAcceptanceUrl = null;

    /**
     * @property string $payerID
     */
    private $payerID = null;

    /**
     * Gets as secureAcceptanceUrl
     *
     * @return string
     */
    public function getSecureAcceptanceUrl()
    {
        return $this->secureAcceptanceUrl;
    }

    /**
     * Sets a new secureAcceptanceUrl
     *
     * @param string $secureAcceptanceUrl
     * @return self
     */
    public function setSecureAcceptanceUrl($secureAcceptanceUrl)
    {
        $this->secureAcceptanceUrl = $secureAcceptanceUrl;
        return $this;
    }

    /**
     * Gets as payerID
     *
     * @return string
     */
    public function getPayerID()
    {
        return $this->payerID;
    }

    /**
     * Sets a new payerID
     *
     * @param string $payerID
     * @return self
     */
    public function setPayerID($payerID)
    {
        $this->payerID = $payerID;
        return $this;
    }


}

