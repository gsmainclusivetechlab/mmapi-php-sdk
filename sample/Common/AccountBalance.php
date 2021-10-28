<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\AccountBalance;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $request = new AccountBalance($accountIdentifier);
    $response = $request->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
