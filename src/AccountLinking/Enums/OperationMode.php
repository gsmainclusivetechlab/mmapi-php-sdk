<?php

namespace mmpsdk\AccountLinking\Enums;

/**
 * Class OperationMode
 * @package mmpsdk\AccountLinking\Enums
 */
class OperationMode
{
    const PUSH = 'push',
        PULL = 'pull',
        BOTH = 'both';

    /**
     * @return array
     */
    public static function getOperationModes()
    {
        return [self::PUSH, self::PULL, self::BOTH];
    }
}
