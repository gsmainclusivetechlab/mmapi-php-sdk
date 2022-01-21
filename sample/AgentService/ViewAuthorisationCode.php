<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\AgentService\AgentService;

$accountIdentifier = [
    'msisdn' => '+44012345678'
];
try {
    $repsonse = AgentService::viewAuthorisationCode(
        $accountIdentifier,
        '8abed542-df3a-41fa-a4e9-3dbc2b7205d2'
    )->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
