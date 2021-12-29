<?php

namespace mmpsdk\AgentService\Models;

use mmpsdk\Common\Models\BaseModel;
use mmpsdk\Common\Utils\CommonUtil;

class Account extends BaseModel
{
    /**
     * @var array
     */
    private $accountIdentifiers;

    /**
     * @var array
     */
    private $identity;

    /**
     * @var string
     */
    private $accountType;

    /**
     * @var string
     */
    private $accountStatus;

    /**
     * @var string
     */
    private $accountSubStatus;

    /**
     * @var string
     */
    private $currentBalance;

    /**
     * @var string
     */
    private $availableBalance;

    /**
     * @var string
     */
    private $reservedBalance;

    /**
     * @var string
     */
    private $unclearedBalance;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var array
     */
    private $fees;

    /**
     * @var array
     */
    private $commissionEarned;

    /**
     * @var string
     */
    private $registeringEntity;

    /**
     * @var string
     */
    private $creationDate;

    /**
     * @var string
     */
    private $modificationDate;

    /**
     * @var string
     */
    private $requestDate;

    /**
     * @var array
     */
    private $customData;

    /**
     * @return array|null
     */
    public function getAccountIdentifiers()
    {
        return $this->accountIdentifiers;
    }

    /**
     * @param array|null $accountIdentifiers
     *
     * @return Account
     */
    public function setAccountIdentifiers($accountIdentifiers)
    {
        $this->accountIdentifiers = $accountIdentifiers;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param array|null $identity
     *
     * @return Account
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param string|null $accountType
     *
     * @return Account
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountStatus()
    {
        return $this->accountStatus;
    }

    /**
     * @param string|null $accountStatus
     *
     * @return Account
     */
    public function setAccountStatus($accountStatus)
    {
        $this->accountStatus = $accountStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountSubStatus()
    {
        return $this->accountSubStatus;
    }

    /**
     * @param string|null $accountSubStatus
     *
     * @return Account
     */
    public function setAccountSubStatus($accountSubStatus)
    {
        $this->accountSubStatus = $accountSubStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrentBalance()
    {
        return $this->currentBalance;
    }

    /**
     * @param string|null $currentBalance
     *
     * @return Account
     */
    public function setCurrentBalance($currentBalance)
    {
        $this->currentBalance = $currentBalance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvailableBalance()
    {
        return $this->availableBalance;
    }

    /**
     * @param string|null $availableBalance
     *
     * @return Account
     */
    public function setAvailableBalance($availableBalance)
    {
        $this->availableBalance = $availableBalance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReservedBalance()
    {
        return $this->reservedBalance;
    }

    /**
     * @param string|null $reservedBalance
     *
     * @return Account
     */
    public function setReservedBalance($reservedBalance)
    {
        $this->reservedBalance = $reservedBalance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnclearedBalance()
    {
        return $this->unclearedBalance;
    }

    /**
     * @param string|null $unclearedBalance
     *
     * @return Account
     */
    public function setUnclearedBalance($unclearedBalance)
    {
        $this->unclearedBalance = $unclearedBalance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     *
     * @return Account
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

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
     * @return Account
     */
    public function setFees($fees)
    {
        $this->fees = $fees;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCommissionEarned()
    {
        return $this->commissionEarned;
    }

    /**
     * @param array|null $commissionEarned
     *
     * @return Account
     */
    public function setCommissionEarned($commissionEarned)
    {
        $this->commissionEarned = $commissionEarned;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegisteringEntity()
    {
        return $this->registeringEntity;
    }

    /**
     * @param string|null $registeringEntity
     *
     * @return Account
     */
    public function setRegisteringEntity($registeringEntity)
    {
        $this->registeringEntity = $registeringEntity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param string|null $creationDate
     *
     * @return Account
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param string|null $modificationDate
     *
     * @return Account
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @param string|null $requestDate
     *
     * @return Account
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param array|null $customData
     *
     * @return Account
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'accountIdentifiers' => CommonUtil::DeserializeToSupportObject(
                $this->accountIdentifiers
            ),
            'identity' => $this->identity,
            'accountType' => $this->accountType,
            'customData' => $this->customData,
            'fees' => $this->fees,
            'registeringEntity' => $this->registeringEntity,
            'requestDate' => $this->requestDate
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'identity',
            new \mmpsdk\AgentService\Models\Identity()
        );
        $this->addHydratorStrategy(
            'commissionEarned',
            new \mmpsdk\AgentService\Models\Commission()
        );
        $this->addHydratorStrategy(
            'fees',
            new \mmpsdk\AgentService\Models\Fees()
        );
    }
}
