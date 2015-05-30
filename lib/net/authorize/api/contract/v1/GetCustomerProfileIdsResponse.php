<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerProfileIdsResponse
 */
class GetCustomerProfileIdsResponse extends ANetApiResponseType
{

    /**
     * @property string[] $ids
     */
    private $ids = null;

    /**
     * Adds as numericString
     *
     * @return self
     * @param string $numericString
     */
    public function addToIds($numericString)
    {
        $this->ids[] = $numericString;
        return $this;
    }

    /**
     * isset ids
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetIds($index)
    {
        return isset($this->ids[$index]);
    }

    /**
     * unset ids
     *
     * @param scalar $index
     * @return void
     */
    public function unsetIds($index)
    {
        unset($this->ids[$index]);
    }

    /**
     * Gets as ids
     *
     * @return string[]
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * Sets a new ids
     *
     * @param string $ids
     * @return self
     */
    public function setIds(array $ids)
    {
        $this->ids = $ids;
        return $this;
    }


}

