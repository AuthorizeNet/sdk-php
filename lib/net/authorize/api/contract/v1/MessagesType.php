<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MessagesType
 *
 * 
 * XSD Type: messagesType
 */
class MessagesType
{

    /**
     * @property string $resultCode
     */
    private $resultCode = null;

    /**
     * @property \net\authorize\api\contract\v1\MessagesType\MessageAType[] $message
     */
    private $message = null;

    /**
     * Gets as resultCode
     *
     * @return string
     */
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * Sets a new resultCode
     *
     * @param string $resultCode
     * @return self
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
        return $this;
    }

    /**
     * Adds as message
     *
     * @return self
     * @param \net\authorize\api\contract\v1\MessagesType\MessageAType $message
     */
    public function addToMessage(\net\authorize\api\contract\v1\MessagesType\MessageAType $message)
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
     * @return \net\authorize\api\contract\v1\MessagesType\MessageAType[]
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message
     *
     * @param \net\authorize\api\contract\v1\MessagesType\MessageAType[] $message
     * @return self
     */
    public function setMessage(array $message)
    {
        $this->message = $message;
        return $this;
    }


}

