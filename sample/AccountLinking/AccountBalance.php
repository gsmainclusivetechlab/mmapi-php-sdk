<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = [
    'walletid' => '1'
];

try {
    $response = AccountLinking::viewAccountBalance(
        $accountIdentifier
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
