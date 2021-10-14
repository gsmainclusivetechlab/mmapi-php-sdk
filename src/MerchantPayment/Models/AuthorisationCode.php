<?php

namespace mmpsdk\MerchantPayment\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class MerchantTransaction
 * @package mmpsdk\MerchantPayment\Models
 */
class AuthorisationCode extends BaseModel
{
    private $authorisationCode;
    private $codeState;
    private $amount;
    private $currency;
    private $amountType;
    private $codeLifetime;
    private $holdFundsIndicator;
    private $redemptionAccountIdentifiers;
    private $redemptionChannels;
    private $redemptionTransactionTypes;
    private $requestingOrganisation;
    private $creationDate;
    private $modificationDate;
    private $requestDate;
    private $customData;
    private $metadata;

    public function setAuthorisationCode($authorisationCode)
    {
        $this->authorisationCode = $authorisationCode;
        return $this;
    }
    public function getAuthorisationCode()
    {
        return $this->authorisationCode;
    }
    public function setCodeState($codeState)
    {
        $this->codeState = $codeState;
        return $this;
    }
    public function getCodeState()
    {
        return $this->codeState;
    }
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
    public function getCurrency()
    {
        return $this->currency;
    }
    public function setAmountType($amountType)
    {
        $this->amountType = $amountType;
        return $this;
    }
    public function getAmountType()
    {
        return $this->amountType;
    }
    public function setCodeLifetime($codeLifetime)
    {
        $this->codeLifetime = $codeLifetime;
        return $this;
    }
    public function getCodeLifetime()
    {
        return $this->codeLifetime;
    }
    public function setHoldFundsIndicator($holdFundsIndicator)
    {
        $this->holdFundsIndicator = $holdFundsIndicator;
        return $this;
    }
    public function getHoldFundsIndicator()
    {
        return $this->holdFundsIndicator;
    }
    public function setRedemptionAccountIdentifiers(
        $redemptionAccountIdentifiers
    ) {
        $this->redemptionAccountIdentifiers = $redemptionAccountIdentifiers;
        return $this;
    }
    public function getRedemptionAccountIdentifiers()
    {
        return $this->redemptionAccountIdentifiers;
    }
    public function setRedemptionChannels($redemptionChannels)
    {
        $this->redemptionChannels = $redemptionChannels;
        return $this;
    }
    public function getRedemptionChannels()
    {
        return $this->redemptionChannels;
    }
    public function setRedemptionTransactionTypes($redemptionTransactionTypes)
    {
        $this->redemptionTransactionTypes = $redemptionTransactionTypes;
        return $this;
    }
    public function getRedemptionTransactionTypes()
    {
        return $this->redemptionTransactionTypes;
    }
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;
        return $this;
    }
    public function getRequestingOrganisation()
    {
        return $this->requestingOrganisation;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
        return $this;
    }
    public function getModificationDate()
    {
        return $this->modificationDate;
    }
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;
        return $this;
    }
    public function getRequestDate()
    {
        return $this->requestDate;
    }
    public function setCustomData($customData)
    {
        $this->customData = $customData;
        return $this;
    }
    public function getCustomData()
    {
        return $this->customData;
    }
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    public function getMetadata()
    {
        return $this->metadata;
    }

    public function jsonSerialize()
    {
        return array_filter(
            [
                'amount' => $this->amount,
                'currency' => $this->currency,
                'amountType' => $this->amountType,
                'codeLifetime' => $this->codeLifetime,
                'holdFundsIndicator' => $this->holdFundsIndicator,
                'redemptionAccountIdentifiers' =>
                    $this->redemptionAccountIdentifiers,
                'redemptionChannels' => $this->redemptionChannels,
                'redemptionTransactionTypes' =>
                    $this->redemptionTransactionTypes,
                'requestingOrganisation' => $this->requestingOrganisation,
                'requestDate' => $this->requestDate,
                'customData' => $this->customData,
                'metadata' => $this->metadata
            ],
            function ($val) {
                return !is_null($val);
            }
        );
    }
}
