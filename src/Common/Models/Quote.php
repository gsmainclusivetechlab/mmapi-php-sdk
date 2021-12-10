<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Quote
 * @package mmpsdk\Common\Models
 */
class Quote extends BaseModel
{
    /**
     * @var string
     */
    private $quoteId;

    /**
     * @var string
     */
    private $receivingAmount;

    /**
     * @var string
     */
    private $receivingCurrency;

    /**
     * @var string
     */
    private $sendingAmount;

    /**
     * @var string
     */
    private $sendingCurrency;

    /**
     * @var string
     */
    private $deliveryMethod;

    /**
     * @var array
     */
    private $fees;

    /**
     * @var string
     */
    private $fxRate;

    /**
     * @var string
     */
    private $quoteExpiryTime;

    /**
     * @var string
     */
    private $receivingServiceProvider;

    /**
     * @return string|null
     */
    public function getQuoteId()
    {
        return $this->quoteId;
    }

    /**
     * @param string|null $quoteId
     *
     * @return Quote
     */
    public function setQuoteId($quoteId)
    {
        $this->quoteId = $quoteId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceivingAmount()
    {
        return $this->receivingAmount;
    }

    /**
     * @param string|null $receivingAmount
     *
     * @return Quote
     */
    public function setReceivingAmount($receivingAmount)
    {
        $this->receivingAmount = $receivingAmount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceivingCurrency()
    {
        return $this->receivingCurrency;
    }

    /**
     * @param string|null $receivingCurrency
     *
     * @return Quote
     */
    public function setReceivingCurrency($receivingCurrency)
    {
        $this->receivingCurrency = $receivingCurrency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSendingAmount()
    {
        return $this->sendingAmount;
    }

    /**
     * @param string|null $sendingAmount
     *
     * @return Quote
     */
    public function setSendingAmount($sendingAmount)
    {
        $this->sendingAmount = $sendingAmount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSendingCurrency()
    {
        return $this->sendingCurrency;
    }

    /**
     * @param string|null $sendingCurrency
     *
     * @return Quote
     */
    public function setSendingCurrency($sendingCurrency)
    {
        $this->sendingCurrency = $sendingCurrency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryMethod()
    {
        return $this->deliveryMethod;
    }

    /**
     * @param string|null $deliveryMethod
     *
     * @return Quote
     */
    public function setDeliveryMethod($deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param array|null $fees
     *
     * @return Quote
     */
    public function setFees($fees)
    {
        $this->fees = $fees;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFxRate()
    {
        return $this->fxRate;
    }

    /**
     * @param string|null $fxRate
     *
     * @return Quote
     */
    public function setFxRate($fxRate)
    {
        $this->fxRate = $fxRate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuoteExpiryTime()
    {
        return $this->quoteExpiryTime;
    }

    /**
     * @param string|null $quoteExpiryTime
     *
     * @return Quote
     */
    public function setQuoteExpiryTime($quoteExpiryTime)
    {
        $this->quoteExpiryTime = $quoteExpiryTime;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceivingServiceProvider()
    {
        return $this->receivingServiceProvider;
    }

    /**
     * @param string|null $receivingServiceProvider
     *
     * @return Quote
     */
    public function setReceivingServiceProvider($receivingServiceProvider)
    {
        $this->receivingServiceProvider = $receivingServiceProvider;

        return $this;
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy('fees', new \mmpsdk\Common\Models\Fees());
    }
}
