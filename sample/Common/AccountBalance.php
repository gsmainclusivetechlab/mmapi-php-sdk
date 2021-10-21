<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\AccountBalance;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $response = AccountBalance::build($accountIdentifier)->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
