<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Process\InitiateTransaction;
use mmpsdk\Disbursement\Enums\DisbursementTransactionType;

/**
 * Class InitiateDisbursement
 * @package mmpsdk\Disbursement\Process
 */
class InitiateDisbursement extends InitiateTransaction
{
   protected $transactionType = DisbursementTransactionType::DISBURSEMENT;
}
