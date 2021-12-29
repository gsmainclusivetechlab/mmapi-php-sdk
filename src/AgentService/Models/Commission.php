<?php

namespace mmpsdk\AgentService\Models;

class CommissionEarned
{
    /**
     * @var string
     */
    private $commissionType;

    /**
     * @var string
     */
    private $commissionAmount;

    /**
     * @var string
     */
    private $commissionCurrency;

    /**
     * @return string|null
     */
    public function getCommissionType()
    {
        return $this->commissionType;
    }

    /**
     * @param string|null $commissionType
     *
     * @return CommissionEarned
     */
    public function setCommissionType($commissionType)
    {
        $this->commissionType = $commissionType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCommissionAmount()
    {
        return $this->commissionAmount;
    }

    /**
     * @param string|null $commissionAmount
     *
     * @return CommissionEarned
     */
    public function setCommissionAmount($commissionAmount)
    {
        $this->commissionAmount = $commissionAmount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCommissionCurrency()
    {
        return $this->commissionCurrency;
    }

    /**
     * @param string|null $commissionCurrency
     *
     * @return CommissionEarned
     */
    public function setCommissionCurrency($commissionCurrency)
    {
        $this->commissionCurrency = $commissionCurrency;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'commissionType' => $this->commissionType,
            'commissionAmount' => $this->commissionAmount,
            'commissionCurrency' => $this->commissionCurrency
        ]);
    }
}
