<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Balance
 * @package mmpsdk\Common\Models
 */
class Balance extends BaseModel
{
    /**
     * Indicates a harmonised representation of the account state.
     *
     * @var string
     */
    private $accountStatus;

    /**
     * The current outstanding balance on the account.
     *
     * @var string
     */
    private $currentBalance;

    /**
     * Indicates the balance that is able to be debited for an account.
     *
     * @var string
     */
    private $availableBalance;

    /**
     * Indicates the portion of the balance that is reserved.
     *
     * @var string
     */
    private $reservedBalance;

    /**
     * Indicates the sum of uncleared funds in an account
     *
     * @var string
     */
    private $unClearedBalance;

    /**
     * Currency for all returned balances.
     *
     * @var string
     */
    private $currency;

    /**
     * Get harmonised representation of the account state.
     *
     * @param string $accountStatus
     * @return Balance
     */
    public function setAccountStatus($accountStatus)
    {
        $this->accountStatus = $accountStatus;
        return $this;
    }

    /**
     * Get harmonised representation of the account state.
     *
     * @return string
     */
    public function getAccountStatus()
    {
        return $this->accountStatus;
    }

    /**
     * Set the current outstanding balance on the account.
     *
     * @param string $currentBalance
     * @return Balance
     */
    public function setCurrentBalance($currentBalance)
    {
        $this->currentBalance = $currentBalance;
        return $this;
    }

    /**
     * Get the current outstanding balance on the account.
     *
     * @return string
     */
    public function getCurrentBalance()
    {
        return $this->currentBalance;
    }

    /**
     * Set the balance that is able to be debited for an account.
     *
     * @param string $availableBalance
     * @return Balance
     */
    public function setAvailableBalance($availableBalance)
    {
        $this->availableBalance = $availableBalance;
        return $this;
    }

    /**
     * Get the balance that is able to be debited for an account.
     *
     * @return string
     */
    public function getAvailableBalance()
    {
        return $this->availableBalance;
    }

    /**
     * Set the portion of the balance that is reserved.
     *
     * @param string $reservedBalance
     * @return Balance
     */
    public function setReservedBalance($reservedBalance)
    {
        $this->reservedBalance = $reservedBalance;
        return $this;
    }

    /**
     * Get the portion of the balance that is reserved.
     *
     * @return string
     */
    public function getReservedBalance()
    {
        return $this->reservedBalance;
    }

    /**
     * Set sum of uncleared funds in an account.
     *
     * @param string $unClearedBalance
     * @return Balance
     */
    public function setUnClearedBalance($unClearedBalance)
    {
        $this->unClearedBalance = $unClearedBalance;
        return $this;
    }

    /**
     * Get sum of uncleared funds in an account.
     *
     * @return string
     */
    public function getUnClearedBalance()
    {
        return $this->unClearedBalance;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Balance
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
