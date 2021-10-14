<?php

require_once 'my_api.php';
require dirname(__DIR__, 1) . '/vendor/autoload.php';
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    MobileMoney::initialize(
        MobileMoney::SANDBOX,
        '59vthmq3f6i15v6jmcjskfkmh',
        'ef8tl4gihlpfd7r8jpc1t1nda33q5kcnn32cj375lq6mg2nv7rb',
        'oVN89kXyTx1cKT3ZohH7h6foEmQmjqQm3OK2U8Ue'
    );
    MobileMoney::setCallbackUrl(
        'https://1527dea3-111f-48de-ba27-1c840df261c1.mock.pstmn.io/callback'
    );
    MobileMoney::setSecurityLevel(SecurityLevel::STANDARD);
    $API = new MyAPI($_REQUEST, $_SERVER['HTTP_ORIGIN']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

?>
