<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ANetApiRequestType
 *
 *
 * XSD Type: ANetApiRequest
 */
class ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\MerchantAuthenticationType
     * $merchantAuthentication
     */
    private $merchantAuthentication = null;

    /**
     * @property string $clientId
     */
    private $clientId = null;

    /**
     * @property string $refId
     */
    private $refId = null;

    /**
     * Gets as merchantAuthentication
     *
     * @return \net\authorize\api\contract\v1\MerchantAuthenticationType
     */
    public function getMerchantAuthentication()
    {
        return $this->merchantAuthentication;
    }

    /**
     * Sets a new merchantAuthentication
     *
     * @param \net\authorize\api\contract\v1\MerchantAuthenticationType
     * $merchantAuthentication
     * @return self
     */
    public function setMerchantAuthentication(\net\authorize\api\contract\v1\MerchantAuthenticationType $merchantAuthentication)
    {
        $this->merchantAuthentication = $merchantAuthentication;
        return $this;
    }

    /**
     * Gets as clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets a new clientId
     *
     * @param string $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Gets as refId
     *
     * @return string
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Sets a new refId
     *
     * @param string $refId
     * @return self
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;
        return $this;
    }


}

