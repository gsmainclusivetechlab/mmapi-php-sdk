<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\RetrievePayments;

$accountIdentifier = ['accountid' => '2000'];
$filter = [
    'offset' => 0,
    'limit' => 10
];

try {
    $response = (new RetrievePayments($accountIdentifier, $filter))->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
