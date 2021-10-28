<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\RetrievePayments;

$accountIdentifier = ['accountid' => '2000'];
$filter = '|';

try {
    $response = (new RetrievePayments($accountIdentifier, $filter))->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
