<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentDetailsType
 *
 *
 * XSD Type: paymentDetails
 */
class PaymentDetailsType
{

    /**
     * @property string $currency
     */
    private $currency = null;

    /**
     * @property string $promoCode
     */
    private $promoCode = null;

    /**
     * @property string $misc
     */
    private $misc = null;

    /**
     * @property string $giftWrap
     */
    private $giftWrap = null;

    /**
     * @property string $discount
     */
    private $discount = null;

    /**
     * @property string $tax
     */
    private $tax = null;

    /**
     * @property string $shippingHandling
     */
    private $shippingHandling = null;

    /**
     * @property string $subTotal
     */
    private $subTotal = null;

    /**
     * @property string $orderID
     */
    private $orderID = null;

    /**
     * @property string $amount
     */
    private $amount = null;

    /**
     * Gets as currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets a new currency
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Gets as promoCode
     *
     * @return string
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }

    /**
     * Sets a new promoCode
     *
     * @param string $promoCode
     * @return self
     */
    public function setPromoCode($promoCode)
    {
        $this->promoCode = $promoCode;
        return $this;
    }

    /**
     * Gets as misc
     *
     * @return string
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * Sets a new misc
     *
     * @param string $misc
     * @return self
     */
    public function setMisc($misc)
    {
        $this->misc = $misc;
        return $this;
    }

    /**
     * Gets as giftWrap
     *
     * @return string
     */
    public function getGiftWrap()
    {
        return $this->giftWrap;
    }

    /**
     * Sets a new giftWrap
     *
     * @param string $giftWrap
     * @return self
     */
    public function setGiftWrap($giftWrap)
    {
        $this->giftWrap = $giftWrap;
        return $this;
    }

    /**
     * Gets as discount
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Sets a new discount
     *
     * @param string $discount
     * @return self
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Gets as tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * @param string $tax
     * @return self
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Gets as shippingHandling
     *
     * @return string
     */
    public function getShippingHandling()
    {
        return $this->shippingHandling;
    }

    /**
     * Sets a new shippingHandling
     *
     * @param string $shippingHandling
     * @return self
     */
    public function setShippingHandling($shippingHandling)
    {
        $this->shippingHandling = $shippingHandling;
        return $this;
    }

    /**
     * Gets as subTotal
     *
     * @return string
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Sets a new subTotal
     *
     * @param string $subTotal
     * @return self
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
        return $this;
    }

    /**
     * Gets as orderID
     *
     * @return string
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * Sets a new orderID
     *
     * @param string $orderID
     * @return self
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
        return $this;
    }

    /**
     * Gets as amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param string $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }


}

