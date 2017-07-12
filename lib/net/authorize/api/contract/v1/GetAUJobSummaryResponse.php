<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetAUJobSummaryResponse
 */
class GetAUJobSummaryResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\AuResponseType[] $auSummary
     */
    private $auSummary = null;

    /**
     * Adds as auResponse
     *
     * @return self
     * @param \net\authorize\api\contract\v1\AuResponseType $auResponse
     */
    public function addToAuSummary(\net\authorize\api\contract\v1\AuResponseType $auResponse)
    {
        $this->auSummary[] = $auResponse;
        return $this;
    }

    /**
     * isset auSummary
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetAuSummary($index)
    {
        return isset($this->auSummary[$index]);
    }

    /**
     * unset auSummary
     *
     * @param scalar $index
     * @return void
     */
    public function unsetAuSummary($index)
    {
        unset($this->auSummary[$index]);
    }

    /**
     * Gets as auSummary
     *
     * @return \net\authorize\api\contract\v1\AuResponseType[]
     */
    public function getAuSummary()
    {
        return $this->auSummary;
    }

    /**
     * Sets a new auSummary
     *
     * @param \net\authorize\api\contract\v1\AuResponseType[] $auSummary
     * @return self
     */
    public function setAuSummary(array $auSummary)
    {
        $this->auSummary = $auSummary;
        return $this;
    }


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

