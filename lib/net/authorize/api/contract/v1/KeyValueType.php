<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing KeyValueType
 *
 * 
 * XSD Type: KeyValue
 */
class KeyValueType
{

    /**
     * @property string $encoding
     */
    private $encoding = null;

    /**
     * @property string $encryptionAlgorithm
     */
    private $encryptionAlgorithm = null;

    /**
     * @property \net\authorize\api\contract\v1\KeyManagementSchemeType $scheme
     */
    private $scheme = null;

    /**
     * Gets as encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Sets a new encoding
     *
     * @param string $encoding
     * @return self
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * Gets as encryptionAlgorithm
     *
     * @return string
     */
    public function getEncryptionAlgorithm()
    {
        return $this->encryptionAlgorithm;
    }

    /**
     * Sets a new encryptionAlgorithm
     *
     * @param string $encryptionAlgorithm
     * @return self
     */
    public function setEncryptionAlgorithm($encryptionAlgorithm)
    {
        $this->encryptionAlgorithm = $encryptionAlgorithm;
        return $this;
    }

    /**
     * Gets as scheme
     *
     * @return \net\authorize\api\contract\v1\KeyManagementSchemeType
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Sets a new scheme
     *
     * @param \net\authorize\api\contract\v1\KeyManagementSchemeType $scheme
     * @return self
     */
    public function setScheme(\net\authorize\api\contract\v1\KeyManagementSchemeType $scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }


}

