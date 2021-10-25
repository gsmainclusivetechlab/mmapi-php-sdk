<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\AccountBalance;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $request = new AccountBalance($accountIdentifier);
    $response = $request->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
