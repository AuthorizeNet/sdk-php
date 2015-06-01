<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing ErrorsAType
 */
class ErrorsAType
{

    /**
     * @property
     * \net\authorize\api\contract\v1\TransactionResponseType\ErrorsAType\ErrorAType[]
     * $error
     */
    private $error = null;

    /**
     * Adds as error
     *
     * @return self
     * @param
     * \net\authorize\api\contract\v1\TransactionResponseType\ErrorsAType\ErrorAType
     * $error
     */
    public function addToError(\net\authorize\api\contract\v1\TransactionResponseType\ErrorsAType\ErrorAType $error)
    {
        $this->error[] = $error;
        return $this;
    }

    /**
     * isset error
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetError($index)
    {
        return isset($this->error[$index]);
    }

    /**
     * unset error
     *
     * @param scalar $index
     * @return void
     */
    public function unsetError($index)
    {
        unset($this->error[$index]);
    }

    /**
     * Gets as error
     *
     * @return
     * \net\authorize\api\contract\v1\TransactionResponseType\ErrorsAType\ErrorAType[]
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Sets a new error
     *
     * @param
     * \net\authorize\api\contract\v1\TransactionResponseType\ErrorsAType\ErrorAType[]
     * $error
     * @return self
     */
    public function setError(array $error)
    {
        $this->error = $error;
        return $this;
    }


}

