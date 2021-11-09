<?php

namespace mmpsdk\InternationalTransfer\Models;

use mmpsdk\Common\Models\BaseModel;
use mmpsdk\Common\Utils\CommonUtil;

/**
 * Class Quotation
 * @package mmpsdk\InternationalTransfer\Models
 */
class Quotation extends BaseModel
{
    /**
     * @var string
     */
    private $quotationReference;

    /**
     * @var array
     */
    private $creditParty;

    /**
     * @var array
     */
    private $debitParty;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @var string
     */
    private $quotationStatus;

    /**
     * @var string
     */
    private $requestAmount;

    /**
     * @var string
     */
    private $requestCurrency;

    /**
     * @var string
     */
    private $availableDeliveryMethod;

    /**
     * @var string
     */
    private $chosenDeliveryMethod;

    /**
     * @var string
     */
    private $originCountry;

    /**
     * @var string
     */
    private $receivingCountry;

    /**
     * @var array
     */
    private $quotes;

    /**
     * @var KYCInformation
     */
    private $recipientKyc;

    /**
     * @var KYCInformation
     */
    private $senderKyc;

    /**
     * @var string
     */
    private $recipientBlockingReason;

    /**
     * @var string
     */
    private $senderBlockingReason;

    /**
     * @var RequestingOrganisation
     */
    private $requestingOrganisation;

    /**
     * @var string
     */
    private $sendingServiceProviderCountry;

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
     * @var array
     */
    private $metadata;

    /**
     * @return string|null
     */
    public function getQuotationReference()
    {
        return $this->quotationReference;
    }

    /**
     * @param string|null $quotationReference
     *
     * @return Quotation
     */
    public function setQuotationReference($quotationReference)
    {
        $this->quotationReference = $quotationReference;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCreditParty()
    {
        return $this->creditParty;
    }

    /**
     * @param array|null $creditParty
     *
     * @return Quotation
     */
    public function setCreditParty($creditParty)
    {
        $this->creditParty = $creditParty;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getDebitParty()
    {
        return $this->debitParty;
    }

    /**
     * @param array|null $debitParty
     *
     * @return Quotation
     */
    public function setDebitParty($debitParty)
    {
        $this->debitParty = $debitParty;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return Quotation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param string|null $subtype
     *
     * @return Quotation
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuotationStatus()
    {
        return $this->quotationStatus;
    }

    /**
     * @param string|null $quotationStatus
     *
     * @return Quotation
     */
    public function setQuotationStatus($quotationStatus)
    {
        $this->quotationStatus = $quotationStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestAmount()
    {
        return $this->requestAmount;
    }

    /**
     * @param string|null $requestAmount
     *
     * @return Quotation
     */
    public function setRequestAmount($requestAmount)
    {
        $this->requestAmount = $requestAmount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestCurrency()
    {
        return $this->requestCurrency;
    }

    /**
     * @param string|null $requestCurrency
     *
     * @return Quotation
     */
    public function setRequestCurrency($requestCurrency)
    {
        $this->requestCurrency = $requestCurrency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvailableDeliveryMethod()
    {
        return $this->availableDeliveryMethod;
    }

    /**
     * @param string|null $availableDeliveryMethod
     *
     * @return Quotation
     */
    public function setAvailableDeliveryMethod($availableDeliveryMethod)
    {
        $this->availableDeliveryMethod = $availableDeliveryMethod;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChosenDeliveryMethod()
    {
        return $this->chosenDeliveryMethod;
    }

    /**
     * @param string|null $chosenDeliveryMethod
     *
     * @return Quotation
     */
    public function setChosenDeliveryMethod($chosenDeliveryMethod)
    {
        $this->chosenDeliveryMethod = $chosenDeliveryMethod;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     * @param string|null $originCountry
     *
     * @return Quotation
     */
    public function setOriginCountry($originCountry)
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceivingCountry()
    {
        return $this->receivingCountry;
    }

    /**
     * @param string|null $receivingCountry
     *
     * @return Quotation
     */
    public function setReceivingCountry($receivingCountry)
    {
        $this->receivingCountry = $receivingCountry;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getQuotes()
    {
        return $this->quotes;
    }

    /**
     * @param array|null $quotes
     *
     * @return Quotation
     */
    public function setQuotes($quotes)
    {
        $this->quotes = $quotes;

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
     * @return Quotation
     */
    public function setRecipientKyc($recipientKyc)
    {
        $this->recipientKyc = $recipientKyc;

        return $this;
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
     * @return Quotation
     */
    public function setSenderKyc($senderKyc)
    {
        $this->senderKyc = $senderKyc;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecipientBlockingReason()
    {
        return $this->recipientBlockingReason;
    }

    /**
     * @param string|null $recipientBlockingReason
     *
     * @return Quotation
     */
    public function setRecipientBlockingReason($recipientBlockingReason)
    {
        $this->recipientBlockingReason = $recipientBlockingReason;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSenderBlockingReason()
    {
        return $this->senderBlockingReason;
    }

    /**
     * @param string|null $senderBlockingReason
     *
     * @return Quotation
     */
    public function setSenderBlockingReason($senderBlockingReason)
    {
        $this->senderBlockingReason = $senderBlockingReason;

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
     * @return Quotation
     */
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSendingServiceProviderCountry()
    {
        return $this->sendingServiceProviderCountry;
    }

    /**
     * @param string|null $sendingServiceProviderCountry
     *
     * @return Quotation
     */
    public function setSendingServiceProviderCountry(
        $sendingServiceProviderCountry
    ) {
        $this->sendingServiceProviderCountry = $sendingServiceProviderCountry;

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
     * @return Quotation
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
     * @return Quotation
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
     * @return Quotation
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
     * @return Quotation
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array|null $metadata
     *
     * @return Quotation
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'creditParty' => CommonUtil::DeserializeToSupportObject(
                $this->creditParty
            ),
            'debitParty' => CommonUtil::DeserializeToSupportObject(
                $this->debitParty
            ),
            'type' => $this->type,
            'subtype' => $this->subtype,
            'requestAmount' => $this->requestAmount,
            'requestCurrency' => $this->requestCurrency,
            'chosenDeliveryMethod' => $this->chosenDeliveryMethod,
            'originCountry' => $this->originCountry,
            'receivingCountry' => $this->receivingCountry,
            'recipientKyc' => $this->recipientKyc,
            'senderKyc' => $this->senderKyc,
            'requestingOrganisation' => $this->requestingOrganisation,
            'sendingServiceProviderCountry' =>
                $this->sendingServiceProviderCountry,
            'requestDate' => $this->requestDate,
            'customData' => CommonUtil::DeserializeToSupportObject(
                $this->customData
            ),
            'metadata' => $this->metadata
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'requestingOrganisation',
            new \mmpsdk\Common\Models\RequestingOrganisation()
        );
        $this->addHydratorStrategy(
            'senderKyc',
            new \mmpsdk\Common\Models\KYCInformation()
        );
        $this->addHydratorStrategy(
            'recipientKyc',
            new \mmpsdk\Common\Models\KYCInformation()
        );
        $this->addHydratorStrategy('quotes', new \mmpsdk\Common\Models\Quote());
    }
}
