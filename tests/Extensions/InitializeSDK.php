<?php

namespace mmpsdkTest\Extensions;

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\BeforeFirstTestHook;

class InitializeSDK implements BeforeFirstTestHook, AfterLastTestHook
{
    public function executeBeforeFirstTest(): void
    {
        $ini = parse_ini_file(dirname(__DIR__, 2) . '/sdk-test-config.ini');
        MobileMoney::initialize(
            MobileMoney::SANDBOX,
            $ini['consumer_key'],
            $ini['consumer_secret'],
            $ini['api_key']
        );
        MobileMoney::setSecurityLevel(SecurityLevel::DEVELOPMENT);
    }

    public function executeAfterLastTest(): void
    {
        // TODO: Implement executeAfterLastTest() method.
    }

    /**
     * @return string|null
     */
    protected function getPhpUnitParam(string $paramName): ?string
    {
        global $argv;
        $k = array_search("--$paramName", $argv);
        if (!$k) return null;
        return $argv[$k + 1];
    }
}
