<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;

$transaction = new Transaction();
$transaction
    ->setAmount('16.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    $request = P2PTransfer::createTransferTransaction($transaction);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
