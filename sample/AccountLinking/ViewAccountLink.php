<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\AccountLinking\AccountLinking;

$accountIdentifier = [
    'msisdn' => '+44012345678'
];
try {
    $repsonse = AccountLinking::ViewAccountLink(
        $accountIdentifier,
        'REF-1642746239816'
    )->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
