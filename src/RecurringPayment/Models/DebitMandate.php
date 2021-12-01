<?php

namespace mmpsdk\RecurringPayment\Models;

use mmpsdk\Common\Models\BaseModel;
use mmpsdk\Common\Utils\CommonUtil;

/**
 * Class DebitMandate
 * @package mmpsdk\RecurringPayment\Models
 */
class DebitMandate extends BaseModel
{
    /**
     * @var string
     */
    private $mandateReference;

    /**
     * @var array
     */
    private $payee;

    /**
     * @var string
     */
    private $mandateStatus;

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $amountLimit;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $endDate;

    /**
     * @var string
     */
    private $frequencyType;

    /**
     * @var int
     */
    private $numberOfPayments;

    /**
     * @var RequestingOrganisation
     */
    private $requestingOrganisation;

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
     * @var string
     */
    private $customData;

    /**
     * @return string|null
     */
    public function getMandateReference()
    {
        return $this->mandateReference;
    }

    /**
     * @param string|null $mandateReference
     *
     * @return DebitMandate
     */
    public function setMandateReference($mandateReference)
    {
        $this->mandateReference = $mandateReference;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * @param array|null $payee
     *
     * @return DebitMandate
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMandateStatus()
    {
        return $this->mandateStatus;
    }

    /**
     * @param string|null $mandateStatus
     *
     * @return DebitMandate
     */
    public function setMandateStatus($mandateStatus)
    {
        $this->mandateStatus = $mandateStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param string|null $startDate
     *
     * @return DebitMandate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAmountLimit()
    {
        return $this->amountLimit;
    }

    /**
     * @param string|null $amountLimit
     *
     * @return DebitMandate
     */
    public function setAmountLimit($amountLimit)
    {
        $this->amountLimit = $amountLimit;

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
     * @return DebitMandate
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string|null $endDate
     *
     * @return DebitMandate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFrequencyType()
    {
        return $this->frequencyType;
    }

    /**
     * @param string|null $frequencyType
     *
     * @return DebitMandate
     */
    public function setFrequencyType($frequencyType)
    {
        $this->frequencyType = $frequencyType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumberOfPayments()
    {
        return $this->numberOfPayments;
    }

    /**
     * @param int|null $numberOfPayments
     *
     * @return DebitMandate
     */
    public function setNumberOfPayments($numberOfPayments)
    {
        $this->numberOfPayments = $numberOfPayments;

        return $this;
    }

    /**
     * @return RequestingOrganisation|null
     */
    public function getRequestingOrganisation()
    {
        return $this->requestingOrganisation;
    }

    /**
     * @param RequestingOrganisation|null $requestingOrganisation
     *
     * @return DebitMandate
     */
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;

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
     * @return DebitMandate
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
     * @return DebitMandate
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
     * @return DebitMandate
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param string|null $customData
     *
     * @return DebitMandate
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'payee' => CommonUtil::DeserializeToSupportObject($this->payee),
            'mandateStatus' => $this->mandateStatus,
            'startDate' => $this->startDate,
            'amountLimit' => $this->amountLimit,
            'currency' => $this->currency,
            'endDate' => $this->endDate,
            'frequencyType' => $this->frequencyType,
            'numberOfPayments' => $this->numberOfPayments,
            'requestingOrganisation' => $this->requestingOrganisation,
            'requestDate' => $this->requestDate,
            'customData' => CommonUtil::DeserializeToSupportObject(
                $this->customData
            )
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'requestingOrganisation',
            new \mmpsdk\Common\Models\RequestingOrganisation()
        );
    }
}
