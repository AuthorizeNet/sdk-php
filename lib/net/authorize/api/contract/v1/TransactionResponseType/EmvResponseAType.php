<?php

namespace net\authorize\api\contract\v1\TransactionResponseType;

/**
 * Class representing EmvResponseAType
 */
class EmvResponseAType
{

    /**
     * @property string $tlvData
     */
    private $tlvData = null;

    /**
     * @property \net\authorize\api\contract\v1\EmvTagType[] $tags
     */
    private $tags = null;

    /**
     * Gets as tlvData
     *
     * @return string
     */
    public function getTlvData()
    {
        return $this->tlvData;
    }

    /**
     * Sets a new tlvData
     *
     * @param string $tlvData
     * @return self
     */
    public function setTlvData($tlvData)
    {
        $this->tlvData = $tlvData;
        return $this;
    }

    /**
     * Adds as tag
     *
     * @return self
     * @param \net\authorize\api\contract\v1\EmvTagType $tag
     */
    public function addToTags(\net\authorize\api\contract\v1\EmvTagType $tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * isset tags
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetTags($index)
    {
        return isset($this->tags[$index]);
    }

    /**
     * unset tags
     *
     * @param scalar $index
     * @return void
     */
    public function unsetTags($index)
    {
        unset($this->tags[$index]);
    }

    /**
     * Gets as tags
     *
     * @return \net\authorize\api\contract\v1\EmvTagType[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets a new tags
     *
     * @param \net\authorize\api\contract\v1\EmvTagType[] $tags
     * @return self
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }


}

