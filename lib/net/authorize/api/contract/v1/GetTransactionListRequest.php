<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetTransactionListRequest
 */
class GetTransactionListRequest extends ANetApiRequestType
{

    /**
     * @property string $batchId
     */
    private $batchId = null;

    /**
     * Gets as batchId
     *
     * @return string
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * Sets a new batchId
     *
     * @param string $batchId
     * @return self
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
        return $this;
    }


}

