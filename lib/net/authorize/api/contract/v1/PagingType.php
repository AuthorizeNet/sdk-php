<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PagingType
 *
 *
 * XSD Type: Paging
 */
class PagingType
{

    /**
     * @property integer $limit
     */
    private $limit = null;

    /**
     * @property integer $offset
     */
    private $offset = null;

    /**
     * Gets as limit
     *
     * @return integer
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets a new limit
     *
     * @param integer $limit
     * @return self
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Gets as offset
     *
     * @return integer
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Sets a new offset
     *
     * @param integer $offset
     * @return self
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }


}

