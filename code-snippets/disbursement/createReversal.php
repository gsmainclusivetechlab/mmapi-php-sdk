<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::createReversal('<<TRANSACTION-REFERENCE>>');

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
    print_r($ex->getErrorObj());
}