<?php
require dirname(__DIR__, 1) . '/autoload.php';
use mmpsdk\Common\Constants\MobileMoney;
error_reporting(E_ALL);
ini_set('display_errors', '1');
$ini = parse_ini_file( dirname(__DIR__, 1) . '/sdk-test-config.ini');
// To suppress the warning during the date() invocation in logs, we would default the timezone to GMT.
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
MobileMoney::initialize(
    MobileMoney::SANDBOX,
    $ini['consumer_key'],
    $ini['consumer_secret'],
    $ini['api_key']
);
