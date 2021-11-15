<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Common;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = '4948587f-bc69-48fa-88a4-e12375e639af';
    $response = Common::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
