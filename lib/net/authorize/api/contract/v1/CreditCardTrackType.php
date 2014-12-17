<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreditCardTrackType
 *
 * 
 * XSD Type: creditCardTrackType
 */
class CreditCardTrackType
{

    /**
     * @property string $track1
     */
    private $track1 = null;

    /**
     * @property string $track2
     */
    private $track2 = null;

    /**
     * Gets as track1
     *
     * @return string
     */
    public function getTrack1()
    {
        return $this->track1;
    }

    /**
     * Sets a new track1
     *
     * @param string $track1
     * @return self
     */
    public function setTrack1($track1)
    {
        $this->track1 = $track1;
        return $this;
    }

    /**
     * Gets as track2
     *
     * @return string
     */
    public function getTrack2()
    {
        return $this->track2;
    }

    /**
     * Sets a new track2
     *
     * @param string $track2
     * @return self
     */
    public function setTrack2($track2)
    {
        $this->track2 = $track2;
        return $this;
    }


}

