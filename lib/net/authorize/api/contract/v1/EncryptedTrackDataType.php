<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing EncryptedTrackDataType
 *
 * 
 * XSD Type: encryptedTrackDataType
 */
class EncryptedTrackDataType
{

    /**
     * @property \net\authorize\api\contract\v1\KeyBlockType $formOfPayment
     */
    private $formOfPayment = null;

    /**
     * Gets as formOfPayment
     *
     * @return \net\authorize\api\contract\v1\KeyBlockType
     */
    public function getFormOfPayment()
    {
        return $this->formOfPayment;
    }

    /**
     * Sets a new formOfPayment
     *
     * @param \net\authorize\api\contract\v1\KeyBlockType $formOfPayment
     * @return self
     */
    public function setFormOfPayment(\net\authorize\api\contract\v1\KeyBlockType $formOfPayment)
    {
        $this->formOfPayment = $formOfPayment;
        return $this;
    }


}

