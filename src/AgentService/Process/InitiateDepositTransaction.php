<?php

namespace mmpsdk\AgentService\Process;

use mmpsdk\Common\Process\InitiateTransaction;
use mmpsdk\AgentService\Enums\AgentServiceTransactionType;

/**
 * Class InitiateDepositTransaction
 * @package mmpsdk\AgentService\Process
 */
class InitiateDepositTransaction extends InitiateTransaction
{
    protected $transactionType = AgentServiceTransactionType::DEPOSIT;
}
