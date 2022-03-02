<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Models\AuthorisationCode;

$authorisationObj = new AuthorisationCode();
$authorisationObj
    ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
    ->setCurrency('GBP')
    ->setAmount('1001.00');
$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AgentService::createAuthorisationCode(
        $accountIdentifier,
        $authorisationObj
    );

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    print_r($clientCorrelationId);

    /**
     *Execute the request
     */
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}