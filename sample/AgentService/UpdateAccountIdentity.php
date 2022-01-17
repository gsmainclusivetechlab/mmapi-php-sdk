<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\PatchData;

try {
    $accountIdentifier = ['accountid' => '2000'];
    $patchRequest = new PatchData();
    $patchRequest
        ->setOp(PatchData::REPLACE)
        ->setPath('/kycVerificationStatus')
        ->setValue('verified');
    $request = AgentService::updateAccountIdentity($accountIdentifier, '105', [
        $patchRequest
    ]);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
