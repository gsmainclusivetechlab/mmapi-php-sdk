<?php
//require the autoload file
require dirname(__DIR__, 1) . '/autoload.php';

//Parse the config file
$ini = parse_ini_file(__DIR__ . '/config.ini');

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Exceptions\SDKException;

//Initialize SDK
try {
    MobileMoney::initialize(
        MobileMoney::PRODUCTION,
        $ini['consumer_key'],
        $ini['consumer_secret'],
        $ini['api_key']
    );
    MobileMoney::setCallbackUrl($ini['callback_url']);
    MobileMoney::setSecurityLevel(SecurityLevel::STANDARD);
} catch (SDKException $exception) {
    prettyPrint($exception->getMessage());
}

function prettyPrint($data)
{
    echo PHP_EOL . print_r($data, true) . PHP_EOL;
}
