<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;

$authorisationObj = new AuthorisationCode();
$authorisationObj
    ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
    ->setCurrency('GBP')
    ->setAmount('1001.00');
$accountIdentifier = [
    'accountid' => 2000
];
try {
    $request = new CreateAuthorisationCode(
        $accountIdentifier,
        $authorisationObj
    );
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
