<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentEmvType
 *
 *
 * XSD Type: paymentEmvType
 */
class PaymentEmvType
{

    /**
     * @property mixed $emvData
     */
    private $emvData = null;

    /**
     * @property mixed $emvDescriptor
     */
    private $emvDescriptor = null;

    /**
     * @property mixed $emvVersion
     */
    private $emvVersion = null;

    /**
     * Gets as emvData
     *
     * @return mixed
     */
    public function getEmvData()
    {
        return $this->emvData;
    }

    /**
     * Sets a new emvData
     *
     * @param mixed $emvData
     * @return self
     */
    public function setEmvData($emvData)
    {
        $this->emvData = $emvData;
        return $this;
    }

    /**
     * Gets as emvDescriptor
     *
     * @return mixed
     */
    public function getEmvDescriptor()
    {
        return $this->emvDescriptor;
    }

    /**
     * Sets a new emvDescriptor
     *
     * @param mixed $emvDescriptor
     * @return self
     */
    public function setEmvDescriptor($emvDescriptor)
    {
        $this->emvDescriptor = $emvDescriptor;
        return $this;
    }

    /**
     * Gets as emvVersion
     *
     * @return mixed
     */
    public function getEmvVersion()
    {
        return $this->emvVersion;
    }

    /**
     * Sets a new emvVersion
     *
     * @param mixed $emvVersion
     * @return self
     */
    public function setEmvVersion($emvVersion)
    {
        $this->emvVersion = $emvVersion;
        return $this;
    }


}

