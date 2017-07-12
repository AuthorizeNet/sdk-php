<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetSettledBatchListRequest
 */
class GetSettledBatchListRequest extends ANetApiRequestType
{

    /**
     * @property boolean $includeStatistics
     */
    private $includeStatistics = null;

    /**
     * @property \DateTime $firstSettlementDate
     */
    private $firstSettlementDate = null;

    /**
     * @property \DateTime $lastSettlementDate
     */
    private $lastSettlementDate = null;

    /**
     * Gets as includeStatistics
     *
     * @return boolean
     */
    public function getIncludeStatistics()
    {
        return $this->includeStatistics;
    }

    /**
     * Sets a new includeStatistics
     *
     * @param boolean $includeStatistics
     * @return self
     */
    public function setIncludeStatistics($includeStatistics)
    {
        $this->includeStatistics = $includeStatistics;
        return $this;
    }

    /**
     * Gets as firstSettlementDate
     *
     * @return \DateTime
     */
    public function getFirstSettlementDate()
    {
        return $this->firstSettlementDate;
    }

    /**
     * Sets a new firstSettlementDate
     *
     * @param \DateTime $firstSettlementDate
     * @return self
     */
    public function setFirstSettlementDate(\DateTime $firstSettlementDate)
    {
        $this->firstSettlementDate = $firstSettlementDate;
        return $this;
    }

    /**
     * Gets as lastSettlementDate
     *
     * @return \DateTime
     */
    public function getLastSettlementDate()
    {
        return $this->lastSettlementDate;
    }

    /**
     * Sets a new lastSettlementDate
     *
     * @param \DateTime $lastSettlementDate
     * @return self
     */
    public function setLastSettlementDate(\DateTime $lastSettlementDate)
    {
        $this->lastSettlementDate = $lastSettlementDate;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
}

