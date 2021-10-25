<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\RetrieveMissingResponse;
use mmpsdk\MerchantPayment\Models\MerchantTransaction;

try {
    $clientCorrelationId = '56647bb2-24e7-43d5-8aa6-b70f568d53c2';
    $request = new RetrieveMissingResponse(
        $clientCorrelationId,
        new MerchantTransaction()
    );
    $response = $request->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
