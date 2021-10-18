<?php

namespace mmpsdk\MerchantPayment\Models;

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\MerchantPayment\Enums\TransactionType;

/**
 * Class Reversal
 * @package mmpsdk\MerchantPayment\Models
 */
class Reversal extends Transaction
{
    public function __construct()
    {
        $this->type = TransactionType::REVERSAL;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'requestingOrganisationTransactionReference' =>
                $this->requestingOrganisationTransactionReference,
            'type' => $this->type,
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
            'geoCode' => $this->geoCode,
            'oneTimeCode' => $this->oneTimeCode,
            'requestingOrganisation' => $this->requestingOrganisation,
            'servicingIdentity' => $this->servicingIdentity,
            'requestDate' => $this->requestDate,
            'customData' => $this->customData,
            'metadata' => $this->metadata
        ]);
    }
}
