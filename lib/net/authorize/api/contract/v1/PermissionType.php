<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PermissionType
 *
 * 
 * XSD Type: permissionType
 */
class PermissionType
{

    /**
     * @property string $permissionName
     */
    private $permissionName = null;

    /**
     * Gets as permissionName
     *
     * @return string
     */
    public function getPermissionName()
    {
        return $this->permissionName;
    }

    /**
     * Sets a new permissionName
     *
     * @param string $permissionName
     * @return self
     */
    public function setPermissionName($permissionName)
    {
        $this->permissionName = $permissionName;
        return $this;
    }


}

