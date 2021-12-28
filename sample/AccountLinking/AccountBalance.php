<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\Common\Exceptions\SDKException;

$accountIdentifier = [
    'walletid' => '1'
];

try {
    $response = AccountLinking::viewAccountBalance(
        $accountIdentifier
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
