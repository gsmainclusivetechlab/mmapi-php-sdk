<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\PatchData;

$accountIdentifier = ['accountid' => '2000'];
$patchRequest = new PatchData();
$patchRequest
    ->setOp(PatchData::REPLACE)
    ->setPath('/kycVerificationStatus')
    ->setValue('verified');

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AgentService::updateAccountIdentity($accountIdentifier, '<<IDENDITY_ID>>', [
        $patchRequest
    ]);

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