<?php

namespace mmpsdkTest\Extensions;

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\BeforeFirstTestHook;
use Dotenv\Dotenv;

class InitializeSDK implements BeforeFirstTestHook, AfterLastTestHook
{
    public function executeBeforeFirstTest(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__, '../../config.env');
        $dotenv->load();
        MobileMoney::initialize(
            MobileMoney::SANDBOX,
            $_ENV['consumer_key'],
            $_ENV['consumer_secret'],
            $_ENV['api_key']
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
        if (!$k) {
            return null;
        }
        return $argv[$k + 1];
    }
}
