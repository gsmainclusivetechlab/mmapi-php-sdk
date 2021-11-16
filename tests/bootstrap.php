<?php
require dirname(__DIR__, 1) . '/autoload.php';
use mmpsdk\Common\Constants\MobileMoney;
error_reporting(E_ALL);
ini_set('display_errors', '1');
// To suppress the warning during the date() invocation in logs, we would default the timezone to GMT.
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
MobileMoney::initialize(
    MobileMoney::SANDBOX,
    '59vthmq3f6i15v6jmcjskfkmh',
    'ef8tl4gihlpfd7r8jpc1t1nda33q5kcnn32cj375lq6mg2nv7rb',
    'oVN89kXyTx1cKT3ZohH7h6foEmQmjqQm3OK2U8Ue'
);
