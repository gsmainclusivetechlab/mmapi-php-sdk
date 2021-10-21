<?php
$loader = require dirname(__DIR__, 1) . '/vendor/autoload.php';
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;

MobileMoney::initialize(
    MobileMoney::PRODUCTION,
    '59vthmq3f6i15v6jmcjskfkmh',
    'ef8tl4gihlpfd7r8jpc1t1nda33q5kcnn32cj375lq6mg2nv7rb',
    'oVN89kXyTx1cKT3ZohH7h6foEmQmjqQm3OK2U8Ue'
);
MobileMoney::setCallbackUrl(
    'https://1527dea3-111f-48de-ba27-1c840df261c1.mock.pstmn.io/callback'
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
