<?php

namespace mmpsdk\InternationalTransfer\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class InternationalTransferInformation
 * @package mmpsdk\InternationalTransfer\Models
 */
class InternationalTransferInformation extends BaseModel
{
    /**
     * @var string
     */
    private $quotationReference;

    /**
     * @var string
     */
    private $quoteId;

    /**
     * @var string
     */
    private $originCountry;

    /**
     * @var string
     */
    private $deliveryMethod;

    /**
     * @var string
     */
    private $receivingCountry;

    /**
     * @var string
     */
    private $relationshipSender;

    /**
     * @var string
     */
    private $recipientBlockingReason;

    /**
     * @var string
     */
    private $senderBlockingReason;

    /**
     * @var string
     */
    private $remittancePurpose;

    /**
     * @var string
     */
    private $sendingServiceProviderCountry;

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
     * @return InternationalTransferInformation
     */
    public function setQuotationReference($quotationReference)
    {
        $this->quotationReference = $quotationReference;

        return $this;
    }

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
     * @return InternationalTransferInformation
     */
    public function setQuoteId($quoteId)
    {
        $this->quoteId = $quoteId;

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
     * @return InternationalTransferInformation
     */
    public function setOriginCountry($originCountry)
    {
        $this->originCountry = $originCountry;

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
     * @return InternationalTransferInformation
     */
    public function setDeliveryMethod($deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;

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
     * @return InternationalTransferInformation
     */
    public function setReceivingCountry($receivingCountry)
    {
        $this->receivingCountry = $receivingCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRelationshipSender()
    {
        return $this->relationshipSender;
    }

    /**
     * @param string|null $relationshipSender
     *
     * @return InternationalTransferInformation
     */
    public function setRelationshipSender($relationshipSender)
    {
        $this->relationshipSender = $relationshipSender;

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
     * @return InternationalTransferInformation
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
     * @return InternationalTransferInformation
     */
    public function setSenderBlockingReason($senderBlockingReason)
    {
        $this->senderBlockingReason = $senderBlockingReason;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRemittancePurpose()
    {
        return $this->remittancePurpose;
    }

    /**
     * @param string|null $remittancePurpose
     *
     * @return InternationalTransferInformation
     */
    public function setRemittancePurpose($remittancePurpose)
    {
        $this->remittancePurpose = $remittancePurpose;

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
     * @return InternationalTransferInformation
     */
    public function setSendingServiceProviderCountry(
        $sendingServiceProviderCountry
    ) {
        $this->sendingServiceProviderCountry = $sendingServiceProviderCountry;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'quotationReference' => $this->quotationReference,
            'quoteId' => $this->quoteId,
            'originCountry' => $this->originCountry,
            'deliveryMethod' => $this->deliveryMethod,
            'receivingCountry' => $this->receivingCountry,
            'relationshipSender' => $this->relationshipSender,
            'remittancePurpose' => $this->remittancePurpose,
            'sendingServiceProviderCountry' =>
                $this->sendingServiceProviderCountry
        ]);
    }
}
