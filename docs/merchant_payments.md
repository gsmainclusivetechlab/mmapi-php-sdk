# Merchant Payments

## Initiate Merchant Payment

-   Create an instance of the transaction object.
    ```php
    use mmpsdk\Common\Models\Transaction;
    $transaction = new Transaction();
    $transaction
        ->setAmount('16.00')
        ->setCurrency('USD')
        ->setCreditParty(['walletid' => '1'])
        ->setDebitParty(['msisdn' => '+44012345678']);
    ```
-   Create an instance of `InitiatePayment` by passing the `Transaction` object and the callback url (optional) as constructor parameters
    ```php
    use mmpsdk\MerchantPayment\Process\InitiatePayment;
    $request = new InitiatePayment($transaction, 'http://example.com/');
    ```
-   If callback url is not supplied to the constructor, the callback url defined during the SDK's initialization will be used. If you set the callback url as null, you'll have to rely on the polling API to determine the status of the request.

-   After initialising, invoke the method `getClientCorrelationId()` to get the client correlation id.

    ```php
    use mmpsdk\MerchantPayment\Process\InitiatePayment;
    $request = new InitiatePayment($transaction, 'http://example.com/');
    $clientCorrelationId = $request->getClientCorrelationId()
    ```

-   Finally, to make the request, invoke the `execute()`
    ```php
    use mmpsdk\MerchantPayment\Process\InitiatePayment;
    use mmpsdk\Common\Exceptions\SDKException;
    try {
        $request = new InitiatePayment($transaction);
        $clientCorrelationId = $request->getClientCorrelationId();
        print_r('client correlation id: ', $clientCorrelationId);
        $repsonse = $request->execute();
        print_r('response: ', $repsonse);
    } catch (SDKException $ex) {
        print_r('error message: ', $ex->getMessage());
        print_r('error object: ', $ex->getErrorObj());
    }
    ```

## Create Authorised Payment Code

-   Create an instance of the `AuthorisationCode` object.
    ```php
    use mmpsdk\MerchantPayment\Models\AuthorisationCode;
    $authorisationObj = new AuthorisationCode();
    $authorisationObj
        ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
        ->setCurrency('GBP')
        ->setAmount('1001.00');
    ```
-   Create an instance of `CreateAuthorisationCode` by passing the `AuthorisationCode` object, account identifiers and the callback url (optional) as constructor parameters

    ```php
    use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;
    $accountIdentifier = [
        'accountid' => 2000
    ];
    $request = new CreateAuthorisationCode($authorisationObj, $accountIdentifier, 'http://example.com/');
    ```

-   After initialising, invoke the method `getClientCorrelationId()` to get the client correlation id.

    ```php
    use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;
    $request = new CreateAuthorisationCode($authorisationObj, $accountIdentifier, 'http://example.com/');
    $clientCorrelationId = $request->getClientCorrelationId()
    ```

-   Finally, to make the request, invoke the `execute()`

    ```php
    use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;
    use mmpsdk\Common\Exceptions\SDKException;
    try {
        $request = new CreateAuthorisationCode($authorisationObj, $accountIdentifier, 'http://example.com/');
        $clientCorrelationId = $request->getClientCorrelationId()
        print_r('client correlation id: ', $clientCorrelationId);
        $repsonse = $request->execute();
        print_r('response: ', $repsonse);
    } catch (SDKException $ex) {
        print_r('error message: ', $ex->getMessage());
        print_r('error object: ', $ex->getErrorObj());
    }
    ```

    Sample Success Response:

    ```
    mmpsdk\Common\Models\RequestState Object
    (
        [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 23c9bd94-810e-4eee-9df3-7635b33910fc
        [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 4c209382-f6ba-47fd-8ede-a21c41a785e5
        [objectReference:mmpsdk\Common\Models\RequestState:private] => 10668
        [status:mmpsdk\Common\Models\RequestState:private] => pending
        [notificationMethod:mmpsdk\Common\Models\RequestState:private] => callback
        [pendingReason:mmpsdk\Common\Models\RequestState:private] =>
        [expiryTime:mmpsdk\Common\Models\RequestState:private] =>
        [pollLimit:mmpsdk\Common\Models\RequestState:private] => 100
        [errorReference:mmpsdk\Common\Models\RequestState:private] =>
    )
    ```

    Sample Error Response:

    ```
    mmpsdk\Common\Models\Error Object
    (
        [errorCategory:mmpsdk\Common\Models\Error:private] => validation
        [errorCode:mmpsdk\Common\Models\Error:private] => formatError
        [errorDescription:mmpsdk\Common\Models\Error:private] => Invalid JSON Field
        [errorDateTime:mmpsdk\Common\Models\Error:private] => 2021-11-05T09:07:54.886Z
        [errorParameters:mmpsdk\Common\Models\Error:private] => Array
            (
                [0] => stdClass Object
                    (
                        [key] => amount
                        [value] => must match "^([0]|([1-9][0-9]{0,17}))([.][0-9]{0,3}[0-9])?$"
                    )

            )

        [hydratorStrategies:protected] =>
        [availableCount:protected] =>
    )
    ```
