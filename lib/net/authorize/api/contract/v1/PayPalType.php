<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PayPalType
 *
 * 
 * XSD Type: payPalType
 */
class PayPalType
{

    /**
     * @property string $successUrl
     */
    private $successUrl = null;

    /**
     * @property string $cancelUrl
     */
    private $cancelUrl = null;

    /**
     * @property string $paypalLc
     */
    private $paypalLc = null;

    /**
     * @property string $paypalHdrImg
     */
    private $paypalHdrImg = null;

    /**
     * @property string $paypalPayflowcolor
     */
    private $paypalPayflowcolor = null;

    /**
     * @property string $payerID
     */
    private $payerID = null;

    /**
     * Gets as successUrl
     *
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * Sets a new successUrl
     *
     * @param string $successUrl
     * @return self
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
        return $this;
    }

    /**
     * Gets as cancelUrl
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * Sets a new cancelUrl
     *
     * @param string $cancelUrl
     * @return self
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /**
     * Gets as paypalLc
     *
     * @return string
     */
    public function getPaypalLc()
    {
        return $this->paypalLc;
    }

    /**
     * Sets a new paypalLc
     *
     * @param string $paypalLc
     * @return self
     */
    public function setPaypalLc($paypalLc)
    {
        $this->paypalLc = $paypalLc;
        return $this;
    }

    /**
     * Gets as paypalHdrImg
     *
     * @return string
     */
    public function getPaypalHdrImg()
    {
        return $this->paypalHdrImg;
    }

    /**
     * Sets a new paypalHdrImg
     *
     * @param string $paypalHdrImg
     * @return self
     */
    public function setPaypalHdrImg($paypalHdrImg)
    {
        $this->paypalHdrImg = $paypalHdrImg;
        return $this;
    }

    /**
     * Gets as paypalPayflowcolor
     *
     * @return string
     */
    public function getPaypalPayflowcolor()
    {
        return $this->paypalPayflowcolor;
    }

    /**
     * Sets a new paypalPayflowcolor
     *
     * @param string $paypalPayflowcolor
     * @return self
     */
    public function setPaypalPayflowcolor($paypalPayflowcolor)
    {
        $this->paypalPayflowcolor = $paypalPayflowcolor;
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

