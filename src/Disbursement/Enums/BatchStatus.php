<?php

namespace mmpsdk\Disbursement\Enums;

/**
 * Class BatchStatus
 * @package mmpsdk\Disbursement\Enums
 */
class BatchStatus
{
    const CREATED = 'created',
        APPROVED = 'approved',
        COMPLETED = 'completed';

    /**
     * @return array
     */
    public static function getBatchStatuses()
    {
        return [self::CREATED, self::APPROVED, self::COMPLETED];
    }
}
