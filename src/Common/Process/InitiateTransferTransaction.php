<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Process\InitiateTransaction;

/**
 * Class InitiateTransferTransaction
 * @package mmpsdk\Common\Process
 */
class InitiateTransferTransaction extends InitiateTransaction
{
    protected $transactionType = 'transfer';
}
