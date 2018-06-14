<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing TransactionListSortingType
 *
 * 
 * XSD Type: TransactionListSorting
 */
class TransactionListSortingType
{

    /**
     * @property string $orderBy
     */
    private $orderBy = null;

    /**
     * @property boolean $orderDescending
     */
    private $orderDescending = null;

    /**
     * Gets as orderBy
     *
     * @return string
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Sets a new orderBy
     *
     * @param string $orderBy
     * @return self
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * Gets as orderDescending
     *
     * @return boolean
     */
    public function getOrderDescending()
    {
        return $this->orderDescending;
    }

    /**
     * Sets a new orderDescending
     *
     * @param boolean $orderDescending
     * @return self
     */
    public function setOrderDescending($orderDescending)
    {
        $this->orderDescending = $orderDescending;
        return $this;
    }


}

