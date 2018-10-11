<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing OrderExType
 *
 * 
 * XSD Type: orderExType
 */
class OrderExType extends OrderType
{

    /**
     * @property string $purchaseOrderNumber
     */
    private $purchaseOrderNumber = null;

    /**
     * Gets as purchaseOrderNumber
     *
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->purchaseOrderNumber;
    }

    /**
     * Sets a new purchaseOrderNumber
     *
     * @param string $purchaseOrderNumber
     * @return self
     */
    public function setPurchaseOrderNumber($purchaseOrderNumber)
    {
        $this->purchaseOrderNumber = $purchaseOrderNumber;
        return $this;
    }


}

