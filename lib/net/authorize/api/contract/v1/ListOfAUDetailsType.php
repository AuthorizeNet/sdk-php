<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ListOfAUDetailsType
 *
 * 
 * XSD Type: ListOfAUDetailsType
 */
class ListOfAUDetailsType
{

    /**
     * @property \net\authorize\api\contract\v1\AuUpdateType[] $auUpdate
     */
    private $auUpdate = null;

    /**
     * @property \net\authorize\api\contract\v1\AuDeleteType[] $auDelete
     */
    private $auDelete = null;

    /**
     * Adds as auUpdate
     *
     * @return self
     * @param \net\authorize\api\contract\v1\AuUpdateType $auUpdate
     */
    public function addToAuUpdate(\net\authorize\api\contract\v1\AuUpdateType $auUpdate)
    {
        $this->auUpdate[] = $auUpdate;
        return $this;
    }

    /**
     * isset auUpdate
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetAuUpdate($index)
    {
        return isset($this->auUpdate[$index]);
    }

    /**
     * unset auUpdate
     *
     * @param scalar $index
     * @return void
     */
    public function unsetAuUpdate($index)
    {
        unset($this->auUpdate[$index]);
    }

    /**
     * Gets as auUpdate
     *
     * @return \net\authorize\api\contract\v1\AuUpdateType[]
     */
    public function getAuUpdate()
    {
        return $this->auUpdate;
    }

    /**
     * Sets a new auUpdate
     *
     * @param \net\authorize\api\contract\v1\AuUpdateType[] $auUpdate
     * @return self
     */
    public function setAuUpdate(array $auUpdate)
    {
        $this->auUpdate = $auUpdate;
        return $this;
    }

    /**
     * Adds as auDelete
     *
     * @return self
     * @param \net\authorize\api\contract\v1\AuDeleteType $auDelete
     */
    public function addToAuDelete(\net\authorize\api\contract\v1\AuDeleteType $auDelete)
    {
        $this->auDelete[] = $auDelete;
        return $this;
    }

    /**
     * isset auDelete
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetAuDelete($index)
    {
        return isset($this->auDelete[$index]);
    }

    /**
     * unset auDelete
     *
     * @param scalar $index
     * @return void
     */
    public function unsetAuDelete($index)
    {
        unset($this->auDelete[$index]);
    }

    /**
     * Gets as auDelete
     *
     * @return \net\authorize\api\contract\v1\AuDeleteType[]
     */
    public function getAuDelete()
    {
        return $this->auDelete;
    }

    /**
     * Sets a new auDelete
     *
     * @param \net\authorize\api\contract\v1\AuDeleteType[] $auDelete
     * @return self
     */
    public function setAuDelete(array $auDelete)
    {
        $this->auDelete = $auDelete;
        return $this;
    }


}

