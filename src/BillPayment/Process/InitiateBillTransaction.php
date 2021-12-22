<?php

namespace mmpsdk\BillPayment\Process;

use mmpsdk\Common\Process\InitiateTransaction;

/**
 * Class InitiateBillTransaction
 * @package mmpsdk\BillPayment\Process
 */
class InitiateBillTransaction extends InitiateTransaction
{
    protected $transactionType = 'billpay';
}
