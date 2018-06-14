<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateProfileResponseType
 *
 * 
 * XSD Type: createProfileResponse
 */
class CreateProfileResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\MessagesType $messages
     */
    private $messages = null;

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string[] $customerPaymentProfileIdList
     */
    private $customerPaymentProfileIdList = null;

    /**
     * @property string[] $customerShippingAddressIdList
     */
    private $customerShippingAddressIdList = null;

    /**
     * Gets as messages
     *
     * @return \net\authorize\api\contract\v1\MessagesType
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Sets a new messages
     *
     * @param \net\authorize\api\contract\v1\MessagesType $messages
     * @return self
     */
    public function setMessages(\net\authorize\api\contract\v1\MessagesType $messages)
    {
        $this->messages = $messages;
        return $this;
    }

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
     * Adds as numericString
     *
     * @return self
     * @param string $numericString
     */
    public function addToCustomerPaymentProfileIdList($numericString)
    {
        $this->customerPaymentProfileIdList[] = $numericString;
        return $this;
    }

    /**
     * isset customerPaymentProfileIdList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetCustomerPaymentProfileIdList($index)
    {
        return isset($this->customerPaymentProfileIdList[$index]);
    }

    /**
     * unset customerPaymentProfileIdList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetCustomerPaymentProfileIdList($index)
    {
        unset($this->customerPaymentProfileIdList[$index]);
    }

    /**
     * Gets as customerPaymentProfileIdList
     *
     * @return string[]
     */
    public function getCustomerPaymentProfileIdList()
    {
        return $this->customerPaymentProfileIdList;
    }

    /**
     * Sets a new customerPaymentProfileIdList
     *
     * @param string $customerPaymentProfileIdList
     * @return self
     */
    public function setCustomerPaymentProfileIdList(array $customerPaymentProfileIdList)
    {
        $this->customerPaymentProfileIdList = $customerPaymentProfileIdList;
        return $this;
    }

    /**
     * Adds as numericString
     *
     * @return self
     * @param string $numericString
     */
    public function addToCustomerShippingAddressIdList($numericString)
    {
        $this->customerShippingAddressIdList[] = $numericString;
        return $this;
    }

    /**
     * isset customerShippingAddressIdList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetCustomerShippingAddressIdList($index)
    {
        return isset($this->customerShippingAddressIdList[$index]);
    }

    /**
     * unset customerShippingAddressIdList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetCustomerShippingAddressIdList($index)
    {
        unset($this->customerShippingAddressIdList[$index]);
    }

    /**
     * Gets as customerShippingAddressIdList
     *
     * @return string[]
     */
    public function getCustomerShippingAddressIdList()
    {
        return $this->customerShippingAddressIdList;
    }

    /**
     * Sets a new customerShippingAddressIdList
     *
     * @param string $customerShippingAddressIdList
     * @return self
     */
    public function setCustomerShippingAddressIdList(array $customerShippingAddressIdList)
    {
        $this->customerShippingAddressIdList = $customerShippingAddressIdList;
        return $this;
    }


}

