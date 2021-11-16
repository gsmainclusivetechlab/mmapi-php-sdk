<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Common;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = 'ea495e98-b5d2-4b03-ba43-4dfbce39cc60';
    $response = Common::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
