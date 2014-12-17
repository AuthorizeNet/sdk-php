<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBGetSubscriptionListRequest
 */
class ARBGetSubscriptionListRequest extends ANetApiRequestType
{

    /**
     * @property string $searchType
     */
    private $searchType = null;

    /**
     * @property \net\authorize\api\contract\v1\ARBGetSubscriptionListSortingType
     * $sorting
     */
    private $sorting = null;

    /**
     * @property \net\authorize\api\contract\v1\PagingType $paging
     */
    private $paging = null;

    /**
     * Gets as searchType
     *
     * @return string
     */
    public function getSearchType()
    {
        return $this->searchType;
    }

    /**
     * Sets a new searchType
     *
     * @param string $searchType
     * @return self
     */
    public function setSearchType($searchType)
    {
        $this->searchType = $searchType;
        return $this;
    }

    /**
     * Gets as sorting
     *
     * @return \net\authorize\api\contract\v1\ARBGetSubscriptionListSortingType
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets a new sorting
     *
     * @param \net\authorize\api\contract\v1\ARBGetSubscriptionListSortingType $sorting
     * @return self
     */
    public function setSorting(\net\authorize\api\contract\v1\ARBGetSubscriptionListSortingType $sorting)
    {
        $this->sorting = $sorting;
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

