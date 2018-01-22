<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing FraudInformationType
 *
 *
 * XSD Type: fraudInformationType
 */
class FraudInformationType
{

    /**
     * @property string[] $fraudFilterList
     */
    private $fraudFilterList = null;

    /**
     * @property string $fraudAction
     */
    private $fraudAction = null;

    /**
     * Adds as fraudFilter
     *
     * @return self
     * @param string $fraudFilter
     */
    public function addToFraudFilterList($fraudFilter)
    {
        $this->fraudFilterList[] = $fraudFilter;
        return $this;
    }

    /**
     * isset fraudFilterList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetFraudFilterList($index)
    {
        return isset($this->fraudFilterList[$index]);
    }

    /**
     * unset fraudFilterList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetFraudFilterList($index)
    {
        unset($this->fraudFilterList[$index]);
    }

    /**
     * Gets as fraudFilterList
     *
     * @return string[]
     */
    public function getFraudFilterList()
    {
        return $this->fraudFilterList;
    }

    /**
     * Sets a new fraudFilterList
     *
     * @param string[] $fraudFilterList
     * @return self
     */
    public function setFraudFilterList(array $fraudFilterList)
    {
        $this->fraudFilterList = $fraudFilterList;
        return $this;
    }

    /**
     * Gets as fraudAction
     *
     * @return string
     */
    public function getFraudAction()
    {
        return $this->fraudAction;
    }

    /**
     * Sets a new fraudAction
     *
     * @param string $fraudAction
     * @return self
     */
    public function setFraudAction($fraudAction)
    {
        $this->fraudAction = $fraudAction;
        return $this;
    }


}

