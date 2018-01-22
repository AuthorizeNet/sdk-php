<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing OrderType
 *
 *
 * XSD Type: orderType
 */
class OrderType
{

    /**
     * @property string $invoiceNumber
     */
    private $invoiceNumber = null;

    /**
     * @property string $description
     */
    private $description = null;

    /**
     * Gets as invoiceNumber
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Sets a new invoiceNumber
     *
     * @param string $invoiceNumber
     * @return self
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


}

