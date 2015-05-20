<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing UserFieldsAType
 */
class UserFieldsAType
{

    /**
     * @property \net\authorize\api\contract\v1\UserFieldType[] $userField
     */
    private $userField = null;

    /**
     * Adds as userField
     *
     * @return self
     * @param \net\authorize\api\contract\v1\UserFieldType $userField
     */
    public function addToUserField(\net\authorize\api\contract\v1\UserFieldType $userField)
    {
        $this->userField[] = $userField;
        return $this;
    }

    /**
     * isset userField
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetUserField($index)
    {
        return isset($this->userField[$index]);
    }

    /**
     * unset userField
     *
     * @param scalar $index
     * @return void
     */
    public function unsetUserField($index)
    {
        unset($this->userField[$index]);
    }

    /**
     * Gets as userField
     *
     * @return \net\authorize\api\contract\v1\UserFieldType[]
     */
    public function getUserField()
    {
        return $this->userField;
    }

    /**
     * Sets a new userField
     *
     * @param \net\authorize\api\contract\v1\UserFieldType[] $userField
     * @return self
     */
    public function setUserField(array $userField)
    {
        $this->userField = $userField;
        return $this;
    }


}

