<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerPaymentProfileListRequest
 */
class GetCustomerPaymentProfileListRequest extends ANetApiRequestType
{

    /**
     * @property string $searchType
     */
    private $searchType = null;

    /**
     * @property string $month
     */
    private $month = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerPaymentProfileSortingType
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
     * Gets as sorting
     *
     * @return \net\authorize\api\contract\v1\CustomerPaymentProfileSortingType
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets a new sorting
     *
     * @param \net\authorize\api\contract\v1\CustomerPaymentProfileSortingType $sorting
     * @return self
     */
    public function setSorting(\net\authorize\api\contract\v1\CustomerPaymentProfileSortingType $sorting)
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


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

