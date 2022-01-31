<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\PatchData;

try {
    $accountIdentifier = ['walletid' => '1'];
    $patchRequest = new PatchData();
    $patchRequest
        ->setOp(PatchData::REPLACE)
        ->setPath('/kycVerificationStatus')
        ->setValue('verified');
    $request = AgentService::updateAccountIdentity($accountIdentifier, '1', [
        $patchRequest
    ]);
    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
