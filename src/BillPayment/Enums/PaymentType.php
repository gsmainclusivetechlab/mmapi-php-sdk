<?php

namespace mmpsdk\BillPayment\Enums;

/**
 * Class PaymentType
 * @package mmpsdk\BillPayment\Enums
 */
class PaymentType
{
    const FULLPAYMENT = '‘fullpayment’',
        PARTIALPAYMENT = '‘partialpayment’';

    /**
     * @return array
     */
    public static function getPaymentTypes()
    {
        return [self::FULLPAYMENT, self::PARTIALPAYMENT];
    }
}
