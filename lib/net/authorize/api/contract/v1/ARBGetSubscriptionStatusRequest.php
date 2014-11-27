<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBGetSubscriptionStatusRequest
 */
class ARBGetSubscriptionStatusRequest extends ANetApiRequestType
{

    /**
     * @property string $subscriptionId
     */
    private $subscriptionId = null;

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


}

