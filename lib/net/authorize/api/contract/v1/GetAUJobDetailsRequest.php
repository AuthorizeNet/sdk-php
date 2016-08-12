<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetAUJobDetailsRequest
 */
class GetAUJobDetailsRequest extends ANetApiRequestType
{

    /**
     * @property string $month
     */
    private $month = null;

    /**
     * @property string $modifiedTypeFilter
     */
    private $modifiedTypeFilter = null;

    /**
     * @property \net\authorize\api\contract\v1\PagingType $paging
     */
    private $paging = null;

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

    /**
     * Gets as modifiedTypeFilter
     *
     * @return string
     */
    public function getModifiedTypeFilter()
    {
        return $this->modifiedTypeFilter;
    }

    /**
     * Sets a new modifiedTypeFilter
     *
     * @param string $modifiedTypeFilter
     * @return self
     */
    public function setModifiedTypeFilter($modifiedTypeFilter)
    {
        $this->modifiedTypeFilter = $modifiedTypeFilter;
        return $this;
    }

    /**
     * Gets as paging
     *
     * @return \net\authorize\api\contract\v1\PagingType
     */
    public function getPaging()
    {
        return $this->paging;
    }

    /**
     * Sets a new paging
     *
     * @param \net\authorize\api\contract\v1\PagingType $paging
     * @return self
     */
    public function setPaging(\net\authorize\api\contract\v1\PagingType $paging)
    {
        $this->paging = $paging;
        return $this;
    }


}

