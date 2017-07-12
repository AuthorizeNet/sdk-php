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


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

