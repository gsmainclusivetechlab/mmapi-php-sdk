<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Process\InitiateTransaction;

/**
 * Class InitiateMerchantTransaction
 * @package mmpsdk\Common\Process
 */
class InitiateMerchantTransaction extends InitiateTransaction
{
    protected $transactionType = 'merchantpay';
}
