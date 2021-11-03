<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Process\InitiateTransaction;
use mmpsdk\MerchantPayment\Enums\TransactionType;

/**
 * Class InitiatePayment
 * @package mmpsdk\MerchantPayment\Process
 */
class InitiatePayment extends InitiateTransaction
{
    protected $transactionType = TransactionType::MERCHANT_PAY;
}
