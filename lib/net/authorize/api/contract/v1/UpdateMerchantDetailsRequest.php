<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateMerchantDetailsRequest
 */
class UpdateMerchantDetailsRequest extends ANetApiRequestType
{
    /**
     * @property boolean $isTestMode
     */
    private $isTestMode = null;

    /**
     * Gets as isTestMode
     *
     * @return boolean
     */
    public function getIsTestMode()
    {
        return $this->isTestMode;
    }

    /**
     * Sets a new isTestMode
     *
     * @param boolean $isTestMode
     * @return self
     */
    public function setIsTestMode($isTestMode)
    {
        $this->isTestMode = $isTestMode;
        return $this;
    }


    // Json Serialize Code
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $values = array_filter(
            (array)get_object_vars($this),
            function ($val) {
                return !is_null($val);
            }
        );
        $mapper = \net\authorize\util\Mapper::Instance();
        foreach($values as $key => $value) {
            $classDetails = $mapper->getClass(get_class(), $key);
            if (isset($value)) {
                if ($classDetails->className === 'Date') {
                    $dateTime = $value->format('Y-m-d');
                    $values[$key] = $dateTime;
                } elseif ($classDetails->className === 'DateTime') {
                    $dateTime = $value->format('Y-m-d\TH:i:s\Z');
                    $values[$key] = $dateTime;
                }
                if (is_array($value)) {
                    if (!$classDetails->isInlineArray) {
                        $subKey = $classDetails->arrayEntryname;
                        $subArray = [$subKey => $value];
                        $values[$key] = $subArray;
                    }
                }
            }
        }
        return array_merge(parent::jsonSerialize(), $values);
    }

}
