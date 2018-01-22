<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetMerchantDetailsResponse
 */
class GetMerchantDetailsResponse extends ANetApiResponseType
{

    /**
     * @property boolean $isTestMode
     */
    private $isTestMode = null;

    /**
     * @property \net\authorize\api\contract\v1\ProcessorType[] $processors
     */
    private $processors = null;

    /**
     * @property string $merchantName
     */
    private $merchantName = null;

    /**
     * @property string $gatewayId
     */
    private $gatewayId = null;

    /**
     * @property string[] $marketTypes
     */
    private $marketTypes = null;

    /**
     * @property string[] $productCodes
     */
    private $productCodes = null;

    /**
     * @property string[] $paymentMethods
     */
    private $paymentMethods = null;

    /**
     * @property string[] $currencies
     */
    private $currencies = null;

    /**
     * Gets as isTestMode
     *
     * @return boolean
     */
    public function getIsTestMode()
    {
        return $this->isTestMode;
    }

    /**
     * Sets a new isTestMode
     *
     * @param boolean $isTestMode
     * @return self
     */
    public function setIsTestMode($isTestMode)
    {
        $this->isTestMode = $isTestMode;
        return $this;
    }

    /**
     * Adds as processor
     *
     * @return self
     * @param \net\authorize\api\contract\v1\ProcessorType $processor
     */
    public function addToProcessors(\net\authorize\api\contract\v1\ProcessorType $processor)
    {
        $this->processors[] = $processor;
        return $this;
    }

    /**
     * isset processors
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetProcessors($index)
    {
        return isset($this->processors[$index]);
    }

    /**
     * unset processors
     *
     * @param scalar $index
     * @return void
     */
    public function unsetProcessors($index)
    {
        unset($this->processors[$index]);
    }

    /**
     * Gets as processors
     *
     * @return \net\authorize\api\contract\v1\ProcessorType[]
     */
    public function getProcessors()
    {
        return $this->processors;
    }

    /**
     * Sets a new processors
     *
     * @param \net\authorize\api\contract\v1\ProcessorType[] $processors
     * @return self
     */
    public function setProcessors(array $processors)
    {
        $this->processors = $processors;
        return $this;
    }

    /**
     * Gets as merchantName
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * Sets a new merchantName
     *
     * @param string $merchantName
     * @return self
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * Gets as gatewayId
     *
     * @return string
     */
    public function getGatewayId()
    {
        return $this->gatewayId;
    }

    /**
     * Sets a new gatewayId
     *
     * @param string $gatewayId
     * @return self
     */
    public function setGatewayId($gatewayId)
    {
        $this->gatewayId = $gatewayId;
        return $this;
    }

    /**
     * Adds as marketType
     *
     * @return self
     * @param string $marketType
     */
    public function addToMarketTypes($marketType)
    {
        $this->marketTypes[] = $marketType;
        return $this;
    }

    /**
     * isset marketTypes
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetMarketTypes($index)
    {
        return isset($this->marketTypes[$index]);
    }

    /**
     * unset marketTypes
     *
     * @param scalar $index
     * @return void
     */
    public function unsetMarketTypes($index)
    {
        unset($this->marketTypes[$index]);
    }

    /**
     * Gets as marketTypes
     *
     * @return string[]
     */
    public function getMarketTypes()
    {
        return $this->marketTypes;
    }

    /**
     * Sets a new marketTypes
     *
     * @param string $marketTypes
     * @return self
     */
    public function setMarketTypes(array $marketTypes)
    {
        $this->marketTypes = $marketTypes;
        return $this;
    }

    /**
     * Adds as productCode
     *
     * @return self
     * @param string $productCode
     */
    public function addToProductCodes($productCode)
    {
        $this->productCodes[] = $productCode;
        return $this;
    }

    /**
     * isset productCodes
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetProductCodes($index)
    {
        return isset($this->productCodes[$index]);
    }

    /**
     * unset productCodes
     *
     * @param scalar $index
     * @return void
     */
    public function unsetProductCodes($index)
    {
        unset($this->productCodes[$index]);
    }

    /**
     * Gets as productCodes
     *
     * @return string[]
     */
    public function getProductCodes()
    {
        return $this->productCodes;
    }

    /**
     * Sets a new productCodes
     *
     * @param string $productCodes
     * @return self
     */
    public function setProductCodes(array $productCodes)
    {
        $this->productCodes = $productCodes;
        return $this;
    }

    /**
     * Adds as paymentMethod
     *
     * @return self
     * @param string $paymentMethod
     */
    public function addToPaymentMethods($paymentMethod)
    {
        $this->paymentMethods[] = $paymentMethod;
        return $this;
    }

    /**
     * isset paymentMethods
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetPaymentMethods($index)
    {
        return isset($this->paymentMethods[$index]);
    }

    /**
     * unset paymentMethods
     *
     * @param scalar $index
     * @return void
     */
    public function unsetPaymentMethods($index)
    {
        unset($this->paymentMethods[$index]);
    }

    /**
     * Gets as paymentMethods
     *
     * @return string[]
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * Sets a new paymentMethods
     *
     * @param string $paymentMethods
     * @return self
     */
    public function setPaymentMethods(array $paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;
        return $this;
    }

    /**
     * Adds as currency
     *
     * @return self
     * @param string $currency
     */
    public function addToCurrencies($currency)
    {
        $this->currencies[] = $currency;
        return $this;
    }

    /**
     * isset currencies
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetCurrencies($index)
    {
        return isset($this->currencies[$index]);
    }

    /**
     * unset currencies
     *
     * @param scalar $index
     * @return void
     */
    public function unsetCurrencies($index)
    {
        unset($this->currencies[$index]);
    }

    /**
     * Gets as currencies
     *
     * @return string[]
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * Sets a new currencies
     *
     * @param string $currencies
     * @return self
     */
    public function setCurrencies(array $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }


}

