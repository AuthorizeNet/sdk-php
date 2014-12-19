<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateFingerPrintRequest
 */
class CreateFingerPrintRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\FingerPrintSupportInformationType
     * $supportInformation
     */
    private $supportInformation = null;

    /**
     * Gets as supportInformation
     *
     * @return \net\authorize\api\contract\v1\FingerPrintSupportInformationType
     */
    public function getSupportInformation()
    {
        return $this->supportInformation;
    }

    /**
     * Sets a new supportInformation
     *
     * @param \net\authorize\api\contract\v1\FingerPrintSupportInformationType
     * $supportInformation
     * @return self
     */
    public function setSupportInformation(\net\authorize\api\contract\v1\FingerPrintSupportInformationType $supportInformation)
    {
        $this->supportInformation = $supportInformation;
        return $this;
    }


}

