<?php

namespace mmpsdk\AgentService\Process;

use mmpsdk\Common\Process\InitiateTransaction;
use mmpsdk\AgentService\Enums\AgentServiceTransactionType;

/**
 * Class InitiateWithdrawalTransaction
 * @package mmpsdk\AgentService\Process
 */
class InitiateWithdrawalTransaction extends InitiateTransaction
{
    protected $transactionType = AgentServiceTransactionType::WITHDRAWAL;
}
