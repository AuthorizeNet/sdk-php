<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetAUJobSummaryRequest
 */
class GetAUJobSummaryRequest extends ANetApiRequestType
{

    /**
     * @property string $month
     */
    private $month = null;

    /**
     * Gets as month
     *
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Sets a new month
     *
     * @param string $month
     * @return self
     */
    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }


}

