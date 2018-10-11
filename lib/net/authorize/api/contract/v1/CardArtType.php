<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CardArtType
 *
 * 
 * XSD Type: cardArt
 */
class CardArtType
{

    /**
     * @property string $cardBrand
     */
    private $cardBrand = null;

    /**
     * @property string $cardImageHeight
     */
    private $cardImageHeight = null;

    /**
     * @property string $cardImageUrl
     */
    private $cardImageUrl = null;

    /**
     * @property string $cardImageWidth
     */
    private $cardImageWidth = null;

    /**
     * @property string $cardType
     */
    private $cardType = null;

    /**
     * Gets as cardBrand
     *
     * @return string
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * Sets a new cardBrand
     *
     * @param string $cardBrand
     * @return self
     */
    public function setCardBrand($cardBrand)
    {
        $this->cardBrand = $cardBrand;
        return $this;
    }

    /**
     * Gets as cardImageHeight
     *
     * @return string
     */
    public function getCardImageHeight()
    {
        return $this->cardImageHeight;
    }

    /**
     * Sets a new cardImageHeight
     *
     * @param string $cardImageHeight
     * @return self
     */
    public function setCardImageHeight($cardImageHeight)
    {
        $this->cardImageHeight = $cardImageHeight;
        return $this;
    }

    /**
     * Gets as cardImageUrl
     *
     * @return string
     */
    public function getCardImageUrl()
    {
        return $this->cardImageUrl;
    }

    /**
     * Sets a new cardImageUrl
     *
     * @param string $cardImageUrl
     * @return self
     */
    public function setCardImageUrl($cardImageUrl)
    {
        $this->cardImageUrl = $cardImageUrl;
        return $this;
    }

    /**
     * Gets as cardImageWidth
     *
     * @return string
     */
    public function getCardImageWidth()
    {
        return $this->cardImageWidth;
    }

    /**
     * Sets a new cardImageWidth
     *
     * @param string $cardImageWidth
     * @return self
     */
    public function setCardImageWidth($cardImageWidth)
    {
        $this->cardImageWidth = $cardImageWidth;
        return $this;
    }

    /**
     * Gets as cardType
     *
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Sets a new cardType
     *
     * @param string $cardType
     * @return self
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
        return $this;
    }


}

