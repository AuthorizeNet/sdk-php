<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetSettledBatchListResponse
 */
class GetSettledBatchListResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\BatchDetailsType[] $batchList
     */
    private $batchList = null;

    /**
     * Adds as batch
     *
     * @return self
     * @param \net\authorize\api\contract\v1\BatchDetailsType $batch
     */
    public function addToBatchList(\net\authorize\api\contract\v1\BatchDetailsType $batch)
    {
        $this->batchList[] = $batch;
        return $this;
    }

    /**
     * isset batchList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetBatchList($index)
    {
        return isset($this->batchList[$index]);
    }

    /**
     * unset batchList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetBatchList($index)
    {
        unset($this->batchList[$index]);
    }

    /**
     * Gets as batchList
     *
     * @return \net\authorize\api\contract\v1\BatchDetailsType[]
     */
    public function getBatchList()
    {
        return $this->batchList;
    }

    /**
     * Sets a new batchList
     *
     * @param \net\authorize\api\contract\v1\BatchDetailsType[] $batchList
     * @return self
     */
    public function setBatchList(array $batchList)
    {
        $this->batchList = $batchList;
        return $this;
    }


}

