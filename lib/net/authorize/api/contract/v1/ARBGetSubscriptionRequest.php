<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBGetSubscriptionRequest
 */
class ARBGetSubscriptionRequest extends ANetApiRequestType
{

    /**
     * @property string $subscriptionId
     */
    private $subscriptionId = null;

    /**
     * @property bool $includeTransactions;
     */
    private $includeTransactions = false;

    /**
     * Gets as subscriptionId
     *
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * Sets a new subscriptionId
     *
     * @param string $subscriptionId
     * @return self
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
        return $this;
    }

    /**
     * Gets the includeTransactions flag
     *
     * @return bool
     */
    public function getIncludeTransactions()
    {
        return $this->includeTransactions;
    }

    /**
     * Sets the includeTransactions flag on the request
     *
     * @param $includeTransactions
     * @return $this
     */
    public function setIncludeTransactions($includeTransactions)
    {
        $this->includeTransactions = $includeTransactions;
        return $this;
    }

}