<?php

namespace mmpsdk\BillPayment\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class BillReference
 * @package mmpsdk\BillPayment\Models
 */
class BillReference extends BaseModel
{
    /**
     * @var string
     */
    private $paymentReferenceType;

    /**
     * @var string
     */
    private $paymentReferenceValue;

    /**
     * @return string|null
     */
    public function getPaymentReferenceType()
    {
        return $this->paymentReferenceType;
    }

    /**
     * @param string|null $paymentReferenceType
     *
     * @return BillReference
     */
    public function setPaymentReferenceType($paymentReferenceType)
    {
        $this->paymentReferenceType = $paymentReferenceType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentReferenceValue()
    {
        return $this->paymentReferenceValue;
    }

    /**
     * @param string|null $paymentReferenceValue
     *
     * @return BillReference
     */
    public function setPaymentReferenceValue($paymentReferenceValue)
    {
        $this->paymentReferenceValue = $paymentReferenceValue;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'paymentReferenceType' => $this->paymentReferenceType,
            'paymentReferenceValue' => $this->paymentReferenceValue
        ]);
    }
}
