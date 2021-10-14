<?php

namespace mmpsdk\MerchantPayment\Models;

use mmpsdk\Common\Models\Transaction;
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
        return array_filter(
            [
                'requestingOrganisationTransactionReference' =>
                    $this->requestingOrganisationTransactionReference,
                'type' => $this->type,
                'subType' => $this->subType,
                'amount' => $this->amount,
                'currency' => $this->currency,
                'creditParty' => $this->creditParty,
                'debitParty' => $this->debitParty,
                'descriptionText' => $this->descriptionText,
                'fees' => $this->fees,
                'geoCode' => $this->geoCode,
                'oneTimeCode' => $this->oneTimeCode,
                'requestingOrganisation' => $this->requestingOrganisation,
                'servicingIdentity' => $this->servicingIdentity,
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
