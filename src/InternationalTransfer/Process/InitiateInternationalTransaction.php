<?php

namespace mmpsdk\InternationalTransfer\Process;

use mmpsdk\Common\Process\InitiateTransaction;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;

/**
 * Class InitiateInternationalTransaction
 * @package mmpsdk\InternationalTransfer\Process
 */
class InitiateInternationalTransaction extends InitiateTransaction
{
    protected $transactionType = InternationalTransactionType::INTERNATIONAL;
}
