<?php

namespace mmpsdk\InternationalTransfer\Enums;

/**
 * Class InternationalTransactionType
 * @package mmpsdk\InternationalTransfer\Enums
 */
class InternationalTransactionType
{
    const INTERNATIONAL = 'inttransfer',
        REVERSAL = 'reversal';

    /**
     * @return array
     */
    public static function getTransactionTypeOptions()
    {
        return [self::INTERNATIONAL, self::REVERSAL];
    }
}
