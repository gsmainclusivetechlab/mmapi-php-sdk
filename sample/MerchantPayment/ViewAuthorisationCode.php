<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\MerchantPayment\MerchantPayment;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    $repsonse = MerchantPayment::viewAuthorisationCode(
        $accountIdentifier,
        '2b68c2a7-e0ef-4fa8-b180-ec092993016c'
    )->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
