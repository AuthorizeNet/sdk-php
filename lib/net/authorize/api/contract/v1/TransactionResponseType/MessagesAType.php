<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing MessagesAType
 */
class MessagesAType
{

    /**
     * @property
     * \net\authorize\api\contract\v1\TransactionResponseType\MessagesAType\MessageAType[]
     * $message
     */
    private $message = null;

    /**
     * Adds as message
     *
     * @return self
     * @param
     * \net\authorize\api\contract\v1\TransactionResponseType\MessagesAType\MessageAType
     * $message
     */
    public function addToMessage(\net\authorize\api\contract\v1\TransactionResponseType\MessagesAType\MessageAType $message)
    {
        $this->message[] = $message;
        return $this;
    }

    /**
     * isset message
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetMessage($index)
    {
        return isset($this->message[$index]);
    }

    /**
     * unset message
     *
     * @param scalar $index
     * @return void
     */
    public function unsetMessage($index)
    {
        unset($this->message[$index]);
    }

    /**
     * Gets as message
     *
     * @return
     * \net\authorize\api\contract\v1\TransactionResponseType\MessagesAType\MessageAType[]
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message
     *
     * @param
     * \net\authorize\api\contract\v1\TransactionResponseType\MessagesAType\MessageAType[]
     * $message
     * @return self
     */
    public function setMessage(array $message)
    {
        $this->message = $message;
        return $this;
    }


}

