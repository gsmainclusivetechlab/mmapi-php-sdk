<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;
use mmpsdk\Common\Utils\CommonUtil;

/**
 * Class Transaction
 * @package mmpsdk\Common\Models
 */
class Transaction extends BaseModel
{
    /**
     * Unique reference for the transaction.
     *
     * @var string
     */
    protected $transactionReference;

    /**
     * A reference provided by the requesting organisation that is to be associated with the transaction.
     *
     * @var string
     */
    protected $requestingOrganisationTransactionReference;

    /**
     * For reversals and refunds, this field indicates the transaction which is the subject of the reversal.
     *
     * @var string
     */
    protected $originalTransactionReference;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $creditParty;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $debitParty;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $type;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $subType;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $transactionStatus;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $amount;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $currency;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $descriptionText;

    /**
     * Undocumented variable
     *
     * @var Fees[]
     */
    protected $fees;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $geoCode;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $oneTimeCode;

    /**
     * Undocumented variable
     *
     * @var mixed
     */
    protected $requestingOrganisation;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $servicingIdentity;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $transactionReceipt;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $creationDate;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $modificationDate;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $requestDate;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $customData;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $metadata;

    /**
     * @var KYCInformation
     */
    protected $senderKyc;

    /**
     * @var KYCInformation
     */
    protected $recipientKyc;

    /**
     * @var InternationalTransferInformation
     */
    protected $internationalTransferInformation;

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
        return $this;
    }
    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

    /**
     * Sets a reference provided by the requesting organisation that is to be associated with the transaction.
     *
     * @param string $transactionReference
     */
    public function setRequestingOrganisationTransactionReference(
        $requestingOrganisationTransactionReference
    ) {
        $this->requestingOrganisationTransactionReference = $requestingOrganisationTransactionReference;
        return $this;
    }
    public function getRequestingOrganisationTransactionReference()
    {
        return $this->requestingOrganisationTransactionReference;
    }

    /**
     * Indicates the transaction which is the subject of the reversal.
     *
     * @param string $transactionReference
     */
    public function setOriginalTransactionReference(
        $originalTransactionReference
    ) {
        $this->originalTransactionReference = $originalTransactionReference;
        return $this;
    }
    public function getOriginalTransactionReference()
    {
        return $this->originalTransactionReference;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param array $creditParty
     */
    public function setCreditParty($creditParty)
    {
        $this->creditParty = $creditParty;
        return $this;
    }
    public function getCreditParty()
    {
        return $this->creditParty;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setDebitParty($debitParty)
    {
        $this->debitParty = $debitParty;
        return $this;
    }
    public function getDebitParty()
    {
        return $this->debitParty;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;
        return $this;
    }
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setTransactionStatus($transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
        return $this;
    }

    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    /**
     * Sets the transaction amount.
     *
     * @param string $transactionReference
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets currency of the transaction amount.
     *
     * @param string $transactionReference
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setDescriptionText($descriptionText)
    {
        $this->descriptionText = $descriptionText;
        return $this;
    }

    public function getDescriptionText()
    {
        return $this->descriptionText;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param Fees[] $transactionReference
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
        return $this;
    }

    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setGeoCode($geoCode)
    {
        $this->geoCode = $geoCode;
        return $this;
    }

    public function getGeoCode()
    {
        return $this->geoCode;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setOneTimeCode($oneTimeCode)
    {
        $this->oneTimeCode = $oneTimeCode;
        return $this;
    }

    public function getOneTimeCode()
    {
        return $this->oneTimeCode;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;
        return $this;
    }

    public function getRequestingOrganisation()
    {
        return $this->requestingOrganisation;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setServicingIdentity($servicingIdentity)
    {
        $this->servicingIdentity = $servicingIdentity;
        return $this;
    }

    public function getServicingIdentity()
    {
        return $this->servicingIdentity;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setTransactionReceipt($transactionReceipt)
    {
        $this->transactionReceipt = $transactionReceipt;
        return $this;
    }

    public function getTransactionReceipt()
    {
        return $this->transactionReceipt;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
        return $this;
    }

    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;
        return $this;
    }

    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;
        return $this;
    }

    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * Sets unique reference for the transaction.
     *
     * @param string $transactionReference
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return KYCInformation|null
     */
    public function getSenderKyc()
    {
        return $this->senderKyc;
    }

    /**
     * @param KYCInformation|null $senderKyc
     *
     * @return Transaction
     */
    public function setSenderKyc($senderKyc)
    {
        $this->senderKyc = $senderKyc;

        return $this;
    }

    /**
     * @return KYCInformation|null
     */
    public function getRecipientKyc()
    {
        return $this->recipientKyc;
    }

    /**
     * @param KYCInformation|null $recipientKyc
     *
     * @return Transaction
     */
    public function setRecipientKyc($recipientKyc)
    {
        $this->recipientKyc = $recipientKyc;

        return $this;
    }

    /**
     * @return InternationalTransferInformation|null
     */
    public function getInternationalTransferInformation()
    {
        return $this->internationalTransferInformation;
    }

    /**
     * @param InternationalTransferInformation|null $internationalTransferInformation
     *
     * @return Transaction
     */
    public function setInternationalTransferInformation(
        $internationalTransferInformation
    ) {
        $this->internationalTransferInformation = $internationalTransferInformation;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'requestingOrganisationTransactionReference' =>
                $this->requestingOrganisationTransactionReference,
            'originalTransactionReference' =>
                $this->originalTransactionReference,
            'subType' => $this->subType,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'creditParty' => CommonUtil::DeserializeToSupportObject(
                $this->creditParty
            ),
            'debitParty' => CommonUtil::DeserializeToSupportObject(
                $this->debitParty
            ),
            'descriptionText' => $this->descriptionText,
            'fees' => $this->fees,
            'type' => $this->type,
            'geoCode' => $this->geoCode,
            'internationalTransferInformation' =>
                $this->internationalTransferInformation,
            'oneTimeCode' => $this->oneTimeCode,
            'recipientKyc' => $this->recipientKyc,
            'senderKyc' => $this->senderKyc,
            'requestingOrganisation' => $this->requestingOrganisation,
            'servicingIdentity' => $this->servicingIdentity,
            'requestDate' => $this->requestDate,
            'customData' => $this->customData,
            'metadata' => $this->metadata
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'requestingOrganisation',
            new \mmpsdk\Common\Models\RequestingOrganisation()
        );
        $this->addHydratorStrategy('fees', new \mmpsdk\Common\Models\Fees());
        $this->addHydratorStrategy(
            'senderKyc',
            new \mmpsdk\Common\Models\KYCInformation()
        );
        $this->addHydratorStrategy(
            'recipientKyc',
            new \mmpsdk\Common\Models\KYCInformation()
        );
        if (
            class_exists(
                'mmpsdk\\InternationalTransfer\\Models\\InternationalTransferInformation'
            )
        ) {
            $this->addHydratorStrategy(
                'internationalTransferInformation',
                new \mmpsdk\InternationalTransfer\Models\InternationalTransferInformation()
            );
        }
    }
}
