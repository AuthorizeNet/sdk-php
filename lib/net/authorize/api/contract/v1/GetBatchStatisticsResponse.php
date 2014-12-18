<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetBatchStatisticsResponse
 */
class GetBatchStatisticsResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\BatchDetailsType $batch
     */
    private $batch = null;

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


}

