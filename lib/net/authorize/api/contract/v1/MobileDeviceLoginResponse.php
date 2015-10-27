<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MobileDeviceLoginResponse
 */
class MobileDeviceLoginResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\MerchantContactType $merchantContact
     */
    private $merchantContact = null;

    /**
     * @property \net\authorize\api\contract\v1\PermissionType[] $userPermissions
     */
    private $userPermissions = null;

    /**
     * @property \net\authorize\api\contract\v1\TransRetailInfoType $merchantAccount
     */
    private $merchantAccount = null;

    /**
     * Gets as merchantContact
     *
     * @return \net\authorize\api\contract\v1\MerchantContactType
     */
    public function getMerchantContact()
    {
        return $this->merchantContact;
    }

    /**
     * Sets a new merchantContact
     *
     * @param \net\authorize\api\contract\v1\MerchantContactType $merchantContact
     * @return self
     */
    public function setMerchantContact(\net\authorize\api\contract\v1\MerchantContactType $merchantContact)
    {
        $this->merchantContact = $merchantContact;
        return $this;
    }

    /**
     * Adds as permission
     *
     * @return self
     * @param \net\authorize\api\contract\v1\PermissionType $permission
     */
    public function addToUserPermissions(\net\authorize\api\contract\v1\PermissionType $permission)
    {
        $this->userPermissions[] = $permission;
        return $this;
    }

    /**
     * isset userPermissions
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetUserPermissions($index)
    {
        return isset($this->userPermissions[$index]);
    }

    /**
     * unset userPermissions
     *
     * @param scalar $index
     * @return void
     */
    public function unsetUserPermissions($index)
    {
        unset($this->userPermissions[$index]);
    }

    /**
     * Gets as userPermissions
     *
     * @return \net\authorize\api\contract\v1\PermissionType[]
     */
    public function getUserPermissions()
    {
        return $this->userPermissions;
    }

    /**
     * Sets a new userPermissions
     *
     * @param \net\authorize\api\contract\v1\PermissionType[] $userPermissions
     * @return self
     */
    public function setUserPermissions(array $userPermissions)
    {
        $this->userPermissions = $userPermissions;
        return $this;
    }

    /**
     * Gets as merchantAccount
     *
     * @return \net\authorize\api\contract\v1\TransRetailInfoType
     */
    public function getMerchantAccount()
    {
        return $this->merchantAccount;
    }

    /**
     * Sets a new merchantAccount
     *
     * @param \net\authorize\api\contract\v1\TransRetailInfoType $merchantAccount
     * @return self
     */
    public function setMerchantAccount(\net\authorize\api\contract\v1\TransRetailInfoType $merchantAccount)
    {
        $this->merchantAccount = $merchantAccount;
        return $this;
    }


}

