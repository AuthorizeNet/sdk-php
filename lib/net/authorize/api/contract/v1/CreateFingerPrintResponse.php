<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateFingerPrintResponse
 */
class CreateFingerPrintResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\FingerPrintType $fingerPrint
     */
    private $fingerPrint = null;

    /**
     * @property \net\authorize\api\contract\v1\FingerPrintSupportInformationType
     * $supportInformation
     */
    private $supportInformation = null;

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

