<?php
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
        $authorisationObj,
        null
    );
    print_r($request->getClientCorrelationId());
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
