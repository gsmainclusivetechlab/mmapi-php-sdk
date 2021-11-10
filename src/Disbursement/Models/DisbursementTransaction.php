<?php

namespace mmpsdk\Disbursement\Models;

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Disbursement\Enums\DisbursementTransactionType;

/**
 * Class DisbursementTransaction
 * @package mmpsdk\Disbursement\Models
 */
class DisbursementTransaction extends Transaction
{
    public function __construct()
    {
        $this->type = DisbursementTransactionType::DISBURSEMENT;
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
            'geoCode' => $this->geoCode,
            'type' => $this->type,
            'oneTimeCode' => $this->oneTimeCode,
            'requestingOrganisation' => $this->requestingOrganisation,
            'servicingIdentity' => $this->servicingIdentity,
            'requestDate' => $this->requestDate,
            'customData' => $this->customData,
            'metadata' => $this->metadata
        ]);
    }
}
