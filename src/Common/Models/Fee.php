<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Fee
 * @package mmpsdk\Common\Models
 */
class Fee extends BaseModel
{
    /**
     * @var string
     */
    protected $feeType;

    /**
     * @var string
     */
    protected $feeAmount;

    /**
     * @var string
     */
    protected $feeCurrency;

    /**
     * Sets the type of the fee.
     *
     * @param string $feeType
     * @return context
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;
        return $this;
    }

    /**
     * Gets the type of the fee.
     *
     * @return string
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * Sets the amount of the fee.
     *
     * @param string $feeAmount
     * @return context
     */
    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
        return $this;
    }

    /**
     * Gets the amount of the fee.
     *
     * @return string
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * Sets the currency for the given fee.
     *
     * @param string $feeCurrency
     * @return context
     */
    public function setFeeCurrency($feeCurrency)
    {
        $this->feeCurrency = $feeCurrency;
        return $this;
    }

    /**
     * Gets the currency for the given fee.
     *
     * @return string
     */
    public function getFeeCurrency()
    {
        return $this->feeCurrency;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'feeType' => $this->feeType,
            'feeAmount' => $this->feeAmount,
            'feeCurrency' => $this->feeCurrency
        ]);
    }
}
