<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Models\AuthorisationCode;

$authorisationObj = new AuthorisationCode();
$authorisationObj
    ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
    ->setCurrency('GBP')
    ->setAmount('1001.00');
$accountIdentifier = [
    'accountid' => 2000
];
try {
    $request = AgentService::createAuthorisationCode(
        $accountIdentifier,
        $authorisationObj
    );
    $request->setNotificationMethod(NotificationMethod::CALLBACK);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
