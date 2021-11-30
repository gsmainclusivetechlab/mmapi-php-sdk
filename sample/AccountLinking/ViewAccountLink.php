<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\AccountLinking\AccountLinking;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    $repsonse = AccountLinking::ViewAccountLink(
        $accountIdentifier,
        'REF-1638185354992'
    )->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
