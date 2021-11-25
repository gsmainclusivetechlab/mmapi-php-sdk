<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\P2PTransfer\P2PTransfer;

try {
    $repsonse = P2PTransfer::viewQuotation('REF-1637057900018')->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
