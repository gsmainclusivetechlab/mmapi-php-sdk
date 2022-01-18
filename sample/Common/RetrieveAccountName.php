<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Common;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = [
    'walletId' => 1
];

try {
    $response = Common::viewAccountName($accountIdentifier)->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
