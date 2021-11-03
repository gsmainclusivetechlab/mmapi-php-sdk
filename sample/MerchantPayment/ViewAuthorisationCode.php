<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\ViewAuthorisationCode;

$accountIdentifier = [
    'accountid' => 2000
];
$filter = [
    'limit' => 4
];
try {
    $repsonse = (new ViewAuthorisationCode(
        $accountIdentifier,
        $filter
    ))->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
