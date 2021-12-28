<?php

namespace mmpsdk\AccountLinking\Enums;

/**
 * Class LinkStatus
 * @package mmpsdk\AccountLinking\Enums
 */
class LinkStatus
{
    const ACTIVE = 'active',
        INACTIVE = 'inactive';

    /**
     * @return array
     */
    public static function getLinkStatus()
    {
        return [self::ACTIVE, self::INACTIVE];
    }
}
