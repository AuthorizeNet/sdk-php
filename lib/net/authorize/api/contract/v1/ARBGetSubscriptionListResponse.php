<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBGetSubscriptionListResponse
 */
class ARBGetSubscriptionListResponse extends ANetApiResponseType
{

    /**
     * @property integer $totalNumInResultSet
     */
    private $totalNumInResultSet = null;

    /**
     * @property \net\authorize\api\contract\v1\SubscriptionDetailType[]
     * $subscriptionDetails
     */
    private $subscriptionDetails = null;

    /**
     * Gets as totalNumInResultSet
     *
     * @return integer
     */
    public function getTotalNumInResultSet()
    {
        return $this->totalNumInResultSet;
    }

    /**
     * Sets a new totalNumInResultSet
     *
     * @param integer $totalNumInResultSet
     * @return self
     */
    public function setTotalNumInResultSet($totalNumInResultSet)
    {
        $this->totalNumInResultSet = $totalNumInResultSet;
        return $this;
    }

    /**
     * Adds as subscriptionDetail
     *
     * @return self
     * @param \net\authorize\api\contract\v1\SubscriptionDetailType $subscriptionDetail
     */
    public function addToSubscriptionDetails(\net\authorize\api\contract\v1\SubscriptionDetailType $subscriptionDetail)
    {
        $this->subscriptionDetails[] = $subscriptionDetail;
        return $this;
    }

    /**
     * isset subscriptionDetails
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetSubscriptionDetails($index)
    {
        return isset($this->subscriptionDetails[$index]);
    }

    /**
     * unset subscriptionDetails
     *
     * @param scalar $index
     * @return void
     */
    public function unsetSubscriptionDetails($index)
    {
        unset($this->subscriptionDetails[$index]);
    }

    /**
     * Gets as subscriptionDetails
     *
     * @return \net\authorize\api\contract\v1\SubscriptionDetailType[]
     */
    public function getSubscriptionDetails()
    {
        return $this->subscriptionDetails;
    }

    /**
     * Sets a new subscriptionDetails
     *
     * @param \net\authorize\api\contract\v1\SubscriptionDetailType[]
     * $subscriptionDetails
     * @return self
     */
    public function setSubscriptionDetails(array $subscriptionDetails)
    {
        $this->subscriptionDetails = $subscriptionDetails;
        return $this;
    }


}

