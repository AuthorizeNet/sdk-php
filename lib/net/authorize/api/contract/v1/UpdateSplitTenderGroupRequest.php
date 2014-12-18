<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateSplitTenderGroupRequest
 */
class UpdateSplitTenderGroupRequest extends ANetApiRequestType
{

    /**
     * @property string $splitTenderId
     */
    private $splitTenderId = null;

    /**
     * @property string $splitTenderStatus
     */
    private $splitTenderStatus = null;

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
     * Gets as splitTenderStatus
     *
     * @return string
     */
    public function getSplitTenderStatus()
    {
        return $this->splitTenderStatus;
    }

    /**
     * Sets a new splitTenderStatus
     *
     * @param string $splitTenderStatus
     * @return self
     */
    public function setSplitTenderStatus($splitTenderStatus)
    {
        $this->splitTenderStatus = $splitTenderStatus;
        return $this;
    }


}

