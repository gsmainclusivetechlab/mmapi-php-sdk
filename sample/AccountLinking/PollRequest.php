<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $serverCorrelationId = 'a554ff60-36bb-4ab4-808a-7b095452f976';
    $response = AccountLinking::viewRequestState(
        $serverCorrelationId
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
