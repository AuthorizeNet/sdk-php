<?php

namespace net\authorize\api\contract\v1\Extensions;


/**
 * Abstract class representing Extensions
 *
 * Helpers for some common tasks in working with the objects
 */

abstract class TypeHelper
{

    /**
     * toArray
     * @return array Returns the object variables as an array
     */
    public function toArray()
    {
        $result = [];

        foreach(get_object_vars($this) as $key => $value) {

            $result[$key] = $value;
        }

        return $result;
    }

    /**
     * fromArray
     * @param  array  $attributes The attributes input array
     * @return void
     */
    public function fromArray(array $attributes)
    {
        foreach ($attributes as $name => $value) {
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

}