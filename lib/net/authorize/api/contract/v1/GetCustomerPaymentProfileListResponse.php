<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerPaymentProfileListResponse
 */
class GetCustomerPaymentProfileListResponse extends ANetApiResponseType
{

    /**
     * @property integer $totalNumInResultSet
     */
    private $totalNumInResultSet = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileListItemType[]
     * $paymentProfiles
     */
    private $paymentProfiles = null;

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
     * Adds as paymentProfile
     *
     * @return self
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileListItemType
     * $paymentProfile
     */
    public function addToPaymentProfiles(\net\authorize\api\contract\v1\CustomerPaymentProfileListItemType $paymentProfile)
    {
        $this->paymentProfiles[] = $paymentProfile;
        return $this;
    }

    /**
     * isset paymentProfiles
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetPaymentProfiles($index)
    {
        return isset($this->paymentProfiles[$index]);
    }

    /**
     * unset paymentProfiles
     *
     * @param scalar $index
     * @return void
     */
    public function unsetPaymentProfiles($index)
    {
        unset($this->paymentProfiles[$index]);
    }

    /**
     * Gets as paymentProfiles
     *
     * @return \net\authorize\api\contract\v1\CustomerPaymentProfileListItemType[]
     */
    public function getPaymentProfiles()
    {
        return $this->paymentProfiles;
    }

    /**
     * Sets a new paymentProfiles
     *
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileListItemType[]
     * $paymentProfiles
     * @return self
     */
    public function setPaymentProfiles(array $paymentProfiles)
    {
        $this->paymentProfiles = $paymentProfiles;
        return $this;
    }


}

