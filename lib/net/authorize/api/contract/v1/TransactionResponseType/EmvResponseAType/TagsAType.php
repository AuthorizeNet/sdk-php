<?php

namespace net\authorize\api\contract\v1\TransactionResponseType\EmvResponseAType;

/**
 * Class representing TagsAType
 */
class TagsAType
{

    /**
     * @property \net\authorize\api\contract\v1\EmvTagType[] $tag
     */
    private $tag = null;

    /**
     * Adds as tag
     *
     * @return self
     * @param \net\authorize\api\contract\v1\EmvTagType $tag
     */
    public function addToTag(\net\authorize\api\contract\v1\EmvTagType $tag)
    {
        $this->tag[] = $tag;
        return $this;
    }

    /**
     * isset tag
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetTag($index)
    {
        return isset($this->tag[$index]);
    }

    /**
     * unset tag
     *
     * @param scalar $index
     * @return void
     */
    public function unsetTag($index)
    {
        unset($this->tag[$index]);
    }

    /**
     * Gets as tag
     *
     * @return \net\authorize\api\contract\v1\EmvTagType[]
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Sets a new tag
     *
     * @param \net\authorize\api\contract\v1\EmvTagType[] $tag
     * @return self
     */
    public function setTag(array $tag)
    {
        $this->tag = $tag;
        return $this;
    }


}

