<?php

namespace mmpsdk\InternationalTransfer\Enums;

/**
 * Class DeliveryMethodType
 * @package mmpsdk\InternationalTransfer\Enums
 */
class DeliveryMethodType
{
    const DIRECT_TO_ACCOUNT = 'directtoaccount',
        AGENT = 'agent',
        PERSONAL_DELIVERY = 'personaldelivery';

    /**
     * @return array
     */
    public static function getDeliveryTypeOptions()
    {
        return [self::DIRECT_TO_ACCOUNT, self::AGENT, self::PERSONAL_DELIVERY];
    }
}
