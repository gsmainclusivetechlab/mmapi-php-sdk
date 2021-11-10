<?php

namespace mmpsdk\Disbursement\Enums;

/**
 * Class DisbursementTransactionType
 * @package mmpsdk\Disbursement\Enums
 */
class DisbursementTransactionType
{
    const DISBURSEMENT = 'disbursement',
        REVERSAL = 'reversal';

    /**
     * @return array
     */
    public static function getTransactionTypeOptions()
    {
        return [self::DISBURSEMENT, self::REVERSAL];
    }
}
