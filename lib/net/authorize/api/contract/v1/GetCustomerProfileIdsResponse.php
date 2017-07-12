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


	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

