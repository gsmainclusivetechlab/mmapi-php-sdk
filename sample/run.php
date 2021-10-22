<?php
$loader = require dirname(__DIR__, 1) . '/vendor/autoload.php';
$ini = parse_ini_file(dirname(__DIR__, 1) . '/sdk-test-config.ini');
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;

MobileMoney::initialize(
    MobileMoney::PRODUCTION,
    $ini['consumer_key'],
    $ini['consumer_secret'],
    $ini['api_key']
);
MobileMoney::setCallbackUrl(
    $ini['callback_url']
);
MobileMoney::setSecurityLevel(SecurityLevel::STANDARD);

if (sizeof($argv) == 3) {
    $folderName = $argv[1];
    $fileName = $argv[2];
    try {
        require_once ucfirst($folderName) . '/' . $fileName . '.php';
    } catch (Exception $ex) {
        echo 'File Not Found: ' .
            ucfirst($folderName) .
            '/' .
            $fileName .
            '.php' .
            PHP_EOL;
    }
} else {
    echo 'Missing folder or file name' . PHP_EOL;
}
