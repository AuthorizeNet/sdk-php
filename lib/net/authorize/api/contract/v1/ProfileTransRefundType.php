<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ProfileTransRefundType
 *
 * 
 * XSD Type: profileTransRefundType
 */
class ProfileTransRefundType extends ProfileTransAmountType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string $customerPaymentProfileId
     */
    private $customerPaymentProfileId = null;

    /**
     * @property string $customerShippingAddressId
     */
    private $customerShippingAddressId = null;

    /**
     * @property string $creditCardNumberMasked
     */
    private $creditCardNumberMasked = null;

    /**
     * @property string $bankRoutingNumberMasked
     */
    private $bankRoutingNumberMasked = null;

    /**
     * @property string $bankAccountNumberMasked
     */
    private $bankAccountNumberMasked = null;

    /**
     * @property \net\authorize\api\contract\v1\OrderExType $order
     */
    private $order = null;

    /**
     * @property string $transId
     */
    private $transId = null;

    /**
     * Gets as customerProfileId
     *
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * Sets a new customerProfileId
     *
     * @param string $customerProfileId
     * @return self
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    /**
     * Gets as customerPaymentProfileId
     *
     * @return string
     */
    public function getCustomerPaymentProfileId()
    {
        return $this->customerPaymentProfileId;
    }

    /**
     * Sets a new customerPaymentProfileId
     *
     * @param string $customerPaymentProfileId
     * @return self
     */
    public function setCustomerPaymentProfileId($customerPaymentProfileId)
    {
        $this->customerPaymentProfileId = $customerPaymentProfileId;
        return $this;
    }

    /**
     * Gets as customerShippingAddressId
     *
     * @return string
     */
    public function getCustomerShippingAddressId()
    {
        return $this->customerShippingAddressId;
    }

    /**
     * Sets a new customerShippingAddressId
     *
     * @param string $customerShippingAddressId
     * @return self
     */
    public function setCustomerShippingAddressId($customerShippingAddressId)
    {
        $this->customerShippingAddressId = $customerShippingAddressId;
        return $this;
    }

    /**
     * Gets as creditCardNumberMasked
     *
     * @return string
     */
    public function getCreditCardNumberMasked()
    {
        return $this->creditCardNumberMasked;
    }

    /**
     * Sets a new creditCardNumberMasked
     *
     * @param string $creditCardNumberMasked
     * @return self
     */
    public function setCreditCardNumberMasked($creditCardNumberMasked)
    {
        $this->creditCardNumberMasked = $creditCardNumberMasked;
        return $this;
    }

    /**
     * Gets as bankRoutingNumberMasked
     *
     * @return string
     */
    public function getBankRoutingNumberMasked()
    {
        return $this->bankRoutingNumberMasked;
    }

    /**
     * Sets a new bankRoutingNumberMasked
     *
     * @param string $bankRoutingNumberMasked
     * @return self
     */
    public function setBankRoutingNumberMasked($bankRoutingNumberMasked)
    {
        $this->bankRoutingNumberMasked = $bankRoutingNumberMasked;
        return $this;
    }

    /**
     * Gets as bankAccountNumberMasked
     *
     * @return string
     */
    public function getBankAccountNumberMasked()
    {
        return $this->bankAccountNumberMasked;
    }

    /**
     * Sets a new bankAccountNumberMasked
     *
     * @param string $bankAccountNumberMasked
     * @return self
     */
    public function setBankAccountNumberMasked($bankAccountNumberMasked)
    {
        $this->bankAccountNumberMasked = $bankAccountNumberMasked;
        return $this;
    }

    /**
     * Gets as order
     *
     * @return \net\authorize\api\contract\v1\OrderExType
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets a new order
     *
     * @param \net\authorize\api\contract\v1\OrderExType $order
     * @return self
     */
    public function setOrder(\net\authorize\api\contract\v1\OrderExType $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Gets as transId
     *
     * @return string
     */
    public function getTransId()
    {
        return $this->transId;
    }

    /**
     * Sets a new transId
     *
     * @param string $transId
     * @return self
     */
    public function setTransId($transId)
    {
        $this->transId = $transId;
        return $this;
    }


}

