<?php
require dirname(__DIR__, 1) . '/autoload.php';
use mmpsdk\Common\Constants\MobileMoney;
error_reporting(E_ALL);
ini_set('display_errors', '1');
// To suppress the warning during the date() invocation in logs, we would default the timezone to GMT.
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
