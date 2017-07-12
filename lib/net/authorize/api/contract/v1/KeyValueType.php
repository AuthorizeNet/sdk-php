<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing KeyValueType
 *
 *
 * XSD Type: KeyValue
 */
class KeyValueType implements \JsonSerializable
{

    /**
     * @property string $encoding
     */
    private $encoding = null;

    /**
     * @property string $encryptionAlgorithm
     */
    private $encryptionAlgorithm = null;

    /**
     * @property \net\authorize\api\contract\v1\KeyManagementSchemeType $scheme
     */
    private $scheme = null;

    /**
     * Gets as encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Sets a new encoding
     *
     * @param string $encoding
     * @return self
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * Gets as encryptionAlgorithm
     *
     * @return string
     */
    public function getEncryptionAlgorithm()
    {
        return $this->encryptionAlgorithm;
    }

    /**
     * Sets a new encryptionAlgorithm
     *
     * @param string $encryptionAlgorithm
     * @return self
     */
    public function setEncryptionAlgorithm($encryptionAlgorithm)
    {
        $this->encryptionAlgorithm = $encryptionAlgorithm;
        return $this;
    }

    /**
     * Gets as scheme
     *
     * @return \net\authorize\api\contract\v1\KeyManagementSchemeType
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Sets a new scheme
     *
     * @param \net\authorize\api\contract\v1\KeyManagementSchemeType $scheme
     * @return self
     */
    public function setScheme(\net\authorize\api\contract\v1\KeyManagementSchemeType $scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }


	//JsonSerialize code appended
	public function jsonSerialize() {$values = array_filter((array)get_object_vars($this), function ($val) {return !is_null($val);});foreach ($values as $key => $value) { if (isset($value) && is_array($value)) {$subKey = str_replace("Type","",lcfirst((new \ReflectionClass($value[0]))->getShortName())); $subArray = [$subKey => $value]; $values[$key] = $subArray; }} if (get_parent_class() == "") {return $values;} else {return array_merge(parent::jsonSerialize(), $values);}}
	//Set code appended
	public function set($data) { foreach ($data AS $key => $value) { if (is_array($value)) { if (isset($value[0]) && is_array($value[0])){ if(substr($key, -1) == "s" && $key != "UserFields"){ $keyClass =  get_class().'\\'.ucfirst($key.'AType').'\\'.ucfirst(substr($key, 0, -1).'AType'); } else{ $keyClass =  get_class().'\\'.ucfirst($key.'AType'); } foreach ($value AS $keyChild => $valueChild) { $type = new $keyClass; $type->set($valueChild); $this->{'addTo'.$key}($type); }} else if (isset($value[0])){foreach($value AS $keyChild => $valueChild){ $this->{'addTo'.$key}($valueChild); }} else{ $keyClass =  __NAMESPACE__.'\\'.ucfirst($key.'Type'); $type = new $keyClass; $type->set($value); $this->{'set'.$key}($type); } } else{ $this->{'set'.$key}($value); } } }
}

