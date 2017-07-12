<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing DecryptPaymentDataResponse
 */
class DecryptPaymentDataResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressType $shippingInfo
     */
    private $shippingInfo = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressType $billingInfo
     */
    private $billingInfo = null;

    /**
     * @property \net\authorize\api\contract\v1\CreditCardMaskedType $cardInfo
     */
    private $cardInfo = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentDetailsType $paymentDetails
     */
    private $paymentDetails = null;

    /**
     * Gets as shippingInfo
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressType
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * Sets a new shippingInfo
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressType $shippingInfo
     * @return self
     */
    public function setShippingInfo(\net\authorize\api\contract\v1\CustomerAddressType $shippingInfo)
    {
        $this->shippingInfo = $shippingInfo;
        return $this;
    }

    /**
     * Gets as billingInfo
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressType
     */
    public function getBillingInfo()
    {
        return $this->billingInfo;
    }

    /**
     * Sets a new billingInfo
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressType $billingInfo
     * @return self
     */
    public function setBillingInfo(\net\authorize\api\contract\v1\CustomerAddressType $billingInfo)
    {
        $this->billingInfo = $billingInfo;
        return $this;
    }

    /**
     * Gets as cardInfo
     *
     * @return \net\authorize\api\contract\v1\CreditCardMaskedType
     */
    public function getCardInfo()
    {
        return $this->cardInfo;
    }

    /**
     * Sets a new cardInfo
     *
     * @param \net\authorize\api\contract\v1\CreditCardMaskedType $cardInfo
     * @return self
     */
    public function setCardInfo(\net\authorize\api\contract\v1\CreditCardMaskedType $cardInfo)
    {
        $this->cardInfo = $cardInfo;
        return $this;
    }

    /**
     * Gets as paymentDetails
     *
     * @return \net\authorize\api\contract\v1\PaymentDetailsType
     */
    public function getPaymentDetails()
    {
        return $this->paymentDetails;
    }

    /**
     * Sets a new paymentDetails
     *
     * @param \net\authorize\api\contract\v1\PaymentDetailsType $paymentDetails
     * @return self
     */
    public function setPaymentDetails(\net\authorize\api\contract\v1\PaymentDetailsType $paymentDetails)
    {
        $this->paymentDetails = $paymentDetails;
        return $this;
    }


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

