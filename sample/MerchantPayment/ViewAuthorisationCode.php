<?php
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
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
