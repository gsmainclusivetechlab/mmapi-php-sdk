<?php

namespace mmpsdk\AgentService\Enums;

/**
 * Class class AgentServiceTransactionType

 * @package mmpsdk\AgentService\Enums
 */
class AgentServiceTransactionType
{
    const DEPOSIT = 'deposit',
        WITHDRAWAL = 'withdrawal',
        ADJUSTMENT = 'adjustment',
        REVERSAL = 'reversal';

    /**
     * @return array
     */
    public static function getTransactionTypeOptions()
    {
        return [
            self::DEPOSIT,
            self::WITHDRAWAL,
            self::ADJUSTMENT,
            self::REVERSAL
        ];
    }
}
