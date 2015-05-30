<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing TransactionDetailsType
 *
 *
 * XSD Type: transactionDetailsType
 */
class TransactionDetailsType
{

    /**
     * @property string $transId
     */
    private $transId = null;

    /**
     * @property string $refTransId
     */
    private $refTransId = null;

    /**
     * @property string $splitTenderId
     */
    private $splitTenderId = null;

    /**
     * @property \DateTime $submitTimeUTC
     */
    private $submitTimeUTC = null;

    /**
     * @property \DateTime $submitTimeLocal
     */
    private $submitTimeLocal = null;

    /**
     * @property string $transactionType
     */
    private $transactionType = null;

    /**
     * @property string $transactionStatus
     */
    private $transactionStatus = null;

    /**
     * @property integer $responseCode
     */
    private $responseCode = null;

    /**
     * @property integer $responseReasonCode
     */
    private $responseReasonCode = null;

    /**
     * @property \net\authorize\api\contract\v1\SubscriptionPaymentType $subscription
     */
    private $subscription = null;

    /**
     * @property string $responseReasonDescription
     */
    private $responseReasonDescription = null;

    /**
     * @property string $authCode
     */
    private $authCode = null;

    /**
     * @property string $aVSResponse
     */
    private $aVSResponse = null;

    /**
     * @property string $cardCodeResponse
     */
    private $cardCodeResponse = null;

    /**
     * @property string $cAVVResponse
     */
    private $cAVVResponse = null;

    /**
     * @property string $fDSFilterAction
     */
    private $fDSFilterAction = null;

    /**
     * @property \net\authorize\api\contract\v1\FDSFilterType[] $fDSFilters
     */
    private $fDSFilters = null;

    /**
     * @property \net\authorize\api\contract\v1\BatchDetailsType $batch
     */
    private $batch = null;

    /**
     * @property \net\authorize\api\contract\v1\OrderExType $order
     */
    private $order = null;

    /**
     * @property float $requestedAmount
     */
    private $requestedAmount = null;

    /**
     * @property float $authAmount
     */
    private $authAmount = null;

    /**
     * @property float $settleAmount
     */
    private $settleAmount = null;

    /**
     * @property \net\authorize\api\contract\v1\ExtendedAmountType $tax
     */
    private $tax = null;

    /**
     * @property \net\authorize\api\contract\v1\ExtendedAmountType $shipping
     */
    private $shipping = null;

    /**
     * @property \net\authorize\api\contract\v1\ExtendedAmountType $duty
     */
    private $duty = null;

    /**
     * @property \net\authorize\api\contract\v1\LineItemType[] $lineItems
     */
    private $lineItems = null;

    /**
     * @property float $prepaidBalanceRemaining
     */
    private $prepaidBalanceRemaining = null;

    /**
     * @property boolean $taxExempt
     */
    private $taxExempt = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentMaskedType $payment
     */
    private $payment = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerDataType $customer
     */
    private $customer = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressType $billTo
     */
    private $billTo = null;

    /**
     * @property \net\authorize\api\contract\v1\NameAndAddressType $shipTo
     */
    private $shipTo = null;

    /**
     * @property boolean $recurringBilling
     */
    private $recurringBilling = null;

    /**
     * @property string $customerIP
     */
    private $customerIP = null;

    /**
     * @property string $product
     */
    private $product = null;

    /**
     * @property string $marketType
     */
    private $marketType = null;

    /**
     * @property string $mobileDeviceId
     */
    private $mobileDeviceId = null;

    /**
     * @property \net\authorize\api\contract\v1\ReturnedItemType[] $returnedItems
     */
    private $returnedItems = null;

    /**
     * @property \net\authorize\api\contract\v1\SolutionType $solution
     */
    private $solution = null;

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

    /**
     * Gets as refTransId
     *
     * @return string
     */
    public function getRefTransId()
    {
        return $this->refTransId;
    }

    /**
     * Sets a new refTransId
     *
     * @param string $refTransId
     * @return self
     */
    public function setRefTransId($refTransId)
    {
        $this->refTransId = $refTransId;
        return $this;
    }

    /**
     * Gets as splitTenderId
     *
     * @return string
     */
    public function getSplitTenderId()
    {
        return $this->splitTenderId;
    }

    /**
     * Sets a new splitTenderId
     *
     * @param string $splitTenderId
     * @return self
     */
    public function setSplitTenderId($splitTenderId)
    {
        $this->splitTenderId = $splitTenderId;
        return $this;
    }

    /**
     * Gets as submitTimeUTC
     *
     * @return \DateTime
     */
    public function getSubmitTimeUTC()
    {
        return $this->submitTimeUTC;
    }

    /**
     * Sets a new submitTimeUTC
     *
     * @param \DateTime $submitTimeUTC
     * @return self
     */
    public function setSubmitTimeUTC(\DateTime $submitTimeUTC)
    {
        $this->submitTimeUTC = $submitTimeUTC;
        return $this;
    }

    /**
     * Gets as submitTimeLocal
     *
     * @return \DateTime
     */
    public function getSubmitTimeLocal()
    {
        return $this->submitTimeLocal;
    }

    /**
     * Sets a new submitTimeLocal
     *
     * @param \DateTime $submitTimeLocal
     * @return self
     */
    public function setSubmitTimeLocal(\DateTime $submitTimeLocal)
    {
        $this->submitTimeLocal = $submitTimeLocal;
        return $this;
    }

    /**
     * Gets as transactionType
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Sets a new transactionType
     *
     * @param string $transactionType
     * @return self
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    /**
     * Gets as transactionStatus
     *
     * @return string
     */
    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    /**
     * Sets a new transactionStatus
     *
     * @param string $transactionStatus
     * @return self
     */
    public function setTransactionStatus($transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
        return $this;
    }

    /**
     * Gets as responseCode
     *
     * @return integer
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Sets a new responseCode
     *
     * @param integer $responseCode
     * @return self
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
        return $this;
    }

    /**
     * Gets as responseReasonCode
     *
     * @return integer
     */
    public function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }

    /**
     * Sets a new responseReasonCode
     *
     * @param integer $responseReasonCode
     * @return self
     */
    public function setResponseReasonCode($responseReasonCode)
    {
        $this->responseReasonCode = $responseReasonCode;
        return $this;
    }

    /**
     * Gets as subscription
     *
     * @return \net\authorize\api\contract\v1\SubscriptionPaymentType
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Sets a new subscription
     *
     * @param \net\authorize\api\contract\v1\SubscriptionPaymentType $subscription
     * @return self
     */
    public function setSubscription(\net\authorize\api\contract\v1\SubscriptionPaymentType $subscription)
    {
        $this->subscription = $subscription;
        return $this;
    }

    /**
     * Gets as responseReasonDescription
     *
     * @return string
     */
    public function getResponseReasonDescription()
    {
        return $this->responseReasonDescription;
    }

    /**
     * Sets a new responseReasonDescription
     *
     * @param string $responseReasonDescription
     * @return self
     */
    public function setResponseReasonDescription($responseReasonDescription)
    {
        $this->responseReasonDescription = $responseReasonDescription;
        return $this;
    }

    /**
     * Gets as authCode
     *
     * @return string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * Sets a new authCode
     *
     * @param string $authCode
     * @return self
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
        return $this;
    }

    /**
     * Gets as aVSResponse
     *
     * @return string
     */
    public function getAVSResponse()
    {
        return $this->aVSResponse;
    }

    /**
     * Sets a new aVSResponse
     *
     * @param string $aVSResponse
     * @return self
     */
    public function setAVSResponse($aVSResponse)
    {
        $this->aVSResponse = $aVSResponse;
        return $this;
    }

    /**
     * Gets as cardCodeResponse
     *
     * @return string
     */
    public function getCardCodeResponse()
    {
        return $this->cardCodeResponse;
    }

    /**
     * Sets a new cardCodeResponse
     *
     * @param string $cardCodeResponse
     * @return self
     */
    public function setCardCodeResponse($cardCodeResponse)
    {
        $this->cardCodeResponse = $cardCodeResponse;
        return $this;
    }

    /**
     * Gets as cAVVResponse
     *
     * @return string
     */
    public function getCAVVResponse()
    {
        return $this->cAVVResponse;
    }

    /**
     * Sets a new cAVVResponse
     *
     * @param string $cAVVResponse
     * @return self
     */
    public function setCAVVResponse($cAVVResponse)
    {
        $this->cAVVResponse = $cAVVResponse;
        return $this;
    }

    /**
     * Gets as fDSFilterAction
     *
     * @return string
     */
    public function getFDSFilterAction()
    {
        return $this->fDSFilterAction;
    }

    /**
     * Sets a new fDSFilterAction
     *
     * @param string $fDSFilterAction
     * @return self
     */
    public function setFDSFilterAction($fDSFilterAction)
    {
        $this->fDSFilterAction = $fDSFilterAction;
        return $this;
    }

    /**
     * Adds as fDSFilter
     *
     * @return self
     * @param \net\authorize\api\contract\v1\FDSFilterType $fDSFilter
     */
    public function addToFDSFilters(\net\authorize\api\contract\v1\FDSFilterType $fDSFilter)
    {
        $this->fDSFilters[] = $fDSFilter;
        return $this;
    }

    /**
     * isset fDSFilters
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetFDSFilters($index)
    {
        return isset($this->fDSFilters[$index]);
    }

    /**
     * unset fDSFilters
     *
     * @param scalar $index
     * @return void
     */
    public function unsetFDSFilters($index)
    {
        unset($this->fDSFilters[$index]);
    }

    /**
     * Gets as fDSFilters
     *
     * @return \net\authorize\api\contract\v1\FDSFilterType[]
     */
    public function getFDSFilters()
    {
        return $this->fDSFilters;
    }

    /**
     * Sets a new fDSFilters
     *
     * @param \net\authorize\api\contract\v1\FDSFilterType[] $fDSFilters
     * @return self
     */
    public function setFDSFilters(array $fDSFilters)
    {
        $this->fDSFilters = $fDSFilters;
        return $this;
    }

    /**
     * Gets as batch
     *
     * @return \net\authorize\api\contract\v1\BatchDetailsType
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * Sets a new batch
     *
     * @param \net\authorize\api\contract\v1\BatchDetailsType $batch
     * @return self
     */
    public function setBatch(\net\authorize\api\contract\v1\BatchDetailsType $batch)
    {
        $this->batch = $batch;
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
     * Gets as requestedAmount
     *
     * @return float
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * Sets a new requestedAmount
     *
     * @param float $requestedAmount
     * @return self
     */
    public function setRequestedAmount($requestedAmount)
    {
        $this->requestedAmount = $requestedAmount;
        return $this;
    }

    /**
     * Gets as authAmount
     *
     * @return float
     */
    public function getAuthAmount()
    {
        return $this->authAmount;
    }

    /**
     * Sets a new authAmount
     *
     * @param float $authAmount
     * @return self
     */
    public function setAuthAmount($authAmount)
    {
        $this->authAmount = $authAmount;
        return $this;
    }

    /**
     * Gets as settleAmount
     *
     * @return float
     */
    public function getSettleAmount()
    {
        return $this->settleAmount;
    }

    /**
     * Sets a new settleAmount
     *
     * @param float $settleAmount
     * @return self
     */
    public function setSettleAmount($settleAmount)
    {
        $this->settleAmount = $settleAmount;
        return $this;
    }

    /**
     * Gets as tax
     *
     * @return \net\authorize\api\contract\v1\ExtendedAmountType
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * @param \net\authorize\api\contract\v1\ExtendedAmountType $tax
     * @return self
     */
    public function setTax(\net\authorize\api\contract\v1\ExtendedAmountType $tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Gets as shipping
     *
     * @return \net\authorize\api\contract\v1\ExtendedAmountType
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Sets a new shipping
     *
     * @param \net\authorize\api\contract\v1\ExtendedAmountType $shipping
     * @return self
     */
    public function setShipping(\net\authorize\api\contract\v1\ExtendedAmountType $shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Gets as duty
     *
     * @return \net\authorize\api\contract\v1\ExtendedAmountType
     */
    public function getDuty()
    {
        return $this->duty;
    }

    /**
     * Sets a new duty
     *
     * @param \net\authorize\api\contract\v1\ExtendedAmountType $duty
     * @return self
     */
    public function setDuty(\net\authorize\api\contract\v1\ExtendedAmountType $duty)
    {
        $this->duty = $duty;
        return $this;
    }

    /**
     * Adds as lineItem
     *
     * @return self
     * @param \net\authorize\api\contract\v1\LineItemType $lineItem
     */
    public function addToLineItems(\net\authorize\api\contract\v1\LineItemType $lineItem)
    {
        $this->lineItems[] = $lineItem;
        return $this;
    }

    /**
     * isset lineItems
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetLineItems($index)
    {
        return isset($this->lineItems[$index]);
    }

    /**
     * unset lineItems
     *
     * @param scalar $index
     * @return void
     */
    public function unsetLineItems($index)
    {
        unset($this->lineItems[$index]);
    }

    /**
     * Gets as lineItems
     *
     * @return \net\authorize\api\contract\v1\LineItemType[]
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * Sets a new lineItems
     *
     * @param \net\authorize\api\contract\v1\LineItemType[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }

    /**
     * Gets as prepaidBalanceRemaining
     *
     * @return float
     */
    public function getPrepaidBalanceRemaining()
    {
        return $this->prepaidBalanceRemaining;
    }

    /**
     * Sets a new prepaidBalanceRemaining
     *
     * @param float $prepaidBalanceRemaining
     * @return self
     */
    public function setPrepaidBalanceRemaining($prepaidBalanceRemaining)
    {
        $this->prepaidBalanceRemaining = $prepaidBalanceRemaining;
        return $this;
    }

    /**
     * Gets as taxExempt
     *
     * @return boolean
     */
    public function getTaxExempt()
    {
        return $this->taxExempt;
    }

    /**
     * Sets a new taxExempt
     *
     * @param boolean $taxExempt
     * @return self
     */
    public function setTaxExempt($taxExempt)
    {
        $this->taxExempt = $taxExempt;
        return $this;
    }

    /**
     * Gets as payment
     *
     * @return \net\authorize\api\contract\v1\PaymentMaskedType
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Sets a new payment
     *
     * @param \net\authorize\api\contract\v1\PaymentMaskedType $payment
     * @return self
     */
    public function setPayment(\net\authorize\api\contract\v1\PaymentMaskedType $payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * Gets as customer
     *
     * @return \net\authorize\api\contract\v1\CustomerDataType
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets a new customer
     *
     * @param \net\authorize\api\contract\v1\CustomerDataType $customer
     * @return self
     */
    public function setCustomer(\net\authorize\api\contract\v1\CustomerDataType $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Gets as billTo
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressType
     */
    public function getBillTo()
    {
        return $this->billTo;
    }

    /**
     * Sets a new billTo
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressType $billTo
     * @return self
     */
    public function setBillTo(\net\authorize\api\contract\v1\CustomerAddressType $billTo)
    {
        $this->billTo = $billTo;
        return $this;
    }

    /**
     * Gets as shipTo
     *
     * @return \net\authorize\api\contract\v1\NameAndAddressType
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * Sets a new shipTo
     *
     * @param \net\authorize\api\contract\v1\NameAndAddressType $shipTo
     * @return self
     */
    public function setShipTo(\net\authorize\api\contract\v1\NameAndAddressType $shipTo)
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * Gets as recurringBilling
     *
     * @return boolean
     */
    public function getRecurringBilling()
    {
        return $this->recurringBilling;
    }

    /**
     * Sets a new recurringBilling
     *
     * @param boolean $recurringBilling
     * @return self
     */
    public function setRecurringBilling($recurringBilling)
    {
        $this->recurringBilling = $recurringBilling;
        return $this;
    }

    /**
     * Gets as customerIP
     *
     * @return string
     */
    public function getCustomerIP()
    {
        return $this->customerIP;
    }

    /**
     * Sets a new customerIP
     *
     * @param string $customerIP
     * @return self
     */
    public function setCustomerIP($customerIP)
    {
        $this->customerIP = $customerIP;
        return $this;
    }

    /**
     * Gets as product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets a new product
     *
     * @param string $product
     * @return self
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * Gets as marketType
     *
     * @return string
     */
    public function getMarketType()
    {
        return $this->marketType;
    }

    /**
     * Sets a new marketType
     *
     * @param string $marketType
     * @return self
     */
    public function setMarketType($marketType)
    {
        $this->marketType = $marketType;
        return $this;
    }

    /**
     * Gets as mobileDeviceId
     *
     * @return string
     */
    public function getMobileDeviceId()
    {
        return $this->mobileDeviceId;
    }

    /**
     * Sets a new mobileDeviceId
     *
     * @param string $mobileDeviceId
     * @return self
     */
    public function setMobileDeviceId($mobileDeviceId)
    {
        $this->mobileDeviceId = $mobileDeviceId;
        return $this;
    }

    /**
     * Adds as returnedItem
     *
     * @return self
     * @param \net\authorize\api\contract\v1\ReturnedItemType $returnedItem
     */
    public function addToReturnedItems(\net\authorize\api\contract\v1\ReturnedItemType $returnedItem)
    {
        $this->returnedItems[] = $returnedItem;
        return $this;
    }

    /**
     * isset returnedItems
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetReturnedItems($index)
    {
        return isset($this->returnedItems[$index]);
    }

    /**
     * unset returnedItems
     *
     * @param scalar $index
     * @return void
     */
    public function unsetReturnedItems($index)
    {
        unset($this->returnedItems[$index]);
    }

    /**
     * Gets as returnedItems
     *
     * @return \net\authorize\api\contract\v1\ReturnedItemType[]
     */
    public function getReturnedItems()
    {
        return $this->returnedItems;
    }

    /**
     * Sets a new returnedItems
     *
     * @param \net\authorize\api\contract\v1\ReturnedItemType[] $returnedItems
     * @return self
     */
    public function setReturnedItems(array $returnedItems)
    {
        $this->returnedItems = $returnedItems;
        return $this;
    }

    /**
     * Gets as solution
     *
     * @return \net\authorize\api\contract\v1\SolutionType
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Sets a new solution
     *
     * @param \net\authorize\api\contract\v1\SolutionType $solution
     * @return self
     */
    public function setSolution(\net\authorize\api\contract\v1\SolutionType $solution)
    {
        $this->solution = $solution;
        return $this;
    }


}

