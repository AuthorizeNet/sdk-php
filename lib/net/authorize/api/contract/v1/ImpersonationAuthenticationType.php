<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ImpersonationAuthenticationType
 *
 *
 * XSD Type: impersonationAuthenticationType
 */
class ImpersonationAuthenticationType
{

    /**
     * @property string $partnerLoginId
     */
    private $partnerLoginId = null;

    /**
     * @property string $partnerTransactionKey
     */
    private $partnerTransactionKey = null;

    /**
     * Gets as partnerLoginId
     *
     * @return string
     */
    public function getPartnerLoginId()
    {
        return $this->partnerLoginId;
    }

    /**
     * Sets a new partnerLoginId
     *
     * @param string $partnerLoginId
     * @return self
     */
    public function setPartnerLoginId($partnerLoginId)
    {
        $this->partnerLoginId = $partnerLoginId;
        return $this;
    }

    /**
     * Gets as partnerTransactionKey
     *
     * @return string
     */
    public function getPartnerTransactionKey()
    {
        return $this->partnerTransactionKey;
    }

    /**
     * Sets a new partnerTransactionKey
     *
     * @param string $partnerTransactionKey
     * @return self
     */
    public function setPartnerTransactionKey($partnerTransactionKey)
    {
        $this->partnerTransactionKey = $partnerTransactionKey;
        return $this;
    }


}

