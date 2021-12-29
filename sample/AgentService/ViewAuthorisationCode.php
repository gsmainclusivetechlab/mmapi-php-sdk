<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\AgentService\AgentService;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    $repsonse = AgentService::viewAuthorisationCode(
        $accountIdentifier,
        '2b68c2a7-e0ef-4fa8-b180-ec092993016c'
    )->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
