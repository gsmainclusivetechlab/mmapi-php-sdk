<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\MerchantPayment;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    $repsonse = MerchantPayment::viewAuthorisationCode(
        $accountIdentifier,
        'f9daa11f-db9d-44ae-9e26-6405e44d5ad7'
    )->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
