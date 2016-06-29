<?php

namespace net\authorize\api\contract\v1\Traits;


/**
 * Abstract class representing Extensions
 *
 * Helpers for some common tasks in working with the objects
 */

trait TypeTraits
{

    /**
     * toArray
     * @return array Returns the object variables as an array
     */
    public function toArray()
    {
        $result = [];

        foreach(get_object_vars($this) as $key => $value) {

            if(substr($key, 0, 1) != "_") {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * fromArray
     * @param  array  $attributes The attributes input array
     * @return void
     */
    public function fromArray($attributes)
    {
        foreach ((array) $attributes as $name => $value) {
            if (property_exists($this, $name)) {
                $value = is_array($value) ? serialize($value) : $value;

                $methodName = $this->_getSetterName($name);
                if ($methodName) {
                    $this->{$methodName}($value);
                } else {
                    $this->$name = $value;
                }
            }
        }
    }

    /**
     * _getSetterName
     * @param  [type] $propertyName [description]
     * @return [type]               [description]
     */
    protected function _getSetterName($propertyName)
    {
        $prefixes = array('add', 'set');

        foreach ($prefixes as $prefix) {
            $methodName = sprintf('%s%s', $prefix, ucfirst(strtolower($propertyName)));

            if (method_exists($this, $methodName)) {
                return $methodName;
            }
        }

        return false;
    }

}