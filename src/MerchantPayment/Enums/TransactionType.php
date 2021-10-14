<?php

namespace mmpsdk\MerchantPayment\Enums;

/**
 * Class TransactionType
 * @package mmpsdk\MerchantPayment\Enums
 */
class TransactionType
{
    public const MERCHANT_PAY = 'merchantpay',
        ADJUSTMENT = 'adjustment',
        REVERSAL = 'reversal';

    /**
     * @return array
     */
    public static function getTransactionTypeOptions()
    {
        return [self::MERCHANT_PAY, self::ADJUSTMENT, self::REVERSAL];
    }
}
