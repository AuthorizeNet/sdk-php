<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBCreateSubscriptionRequest
 */
class ARBCreateSubscriptionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\ARBSubscriptionType $subscription
     */
    private $subscription = null;

    /**
     * Gets as subscription
     *
     * @return \net\authorize\api\contract\v1\ARBSubscriptionType
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Sets a new subscription
     *
     * @param \net\authorize\api\contract\v1\ARBSubscriptionType $subscription
     * @return self
     */
    public function setSubscription(\net\authorize\api\contract\v1\ARBSubscriptionType $subscription)
    {
        $this->subscription = $subscription;
        return $this;
    }


}

