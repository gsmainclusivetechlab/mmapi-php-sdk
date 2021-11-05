This page will document the API classes and ways to properly use the API.

## Initialization

Example basic initialization with required arguments:

```php
<?php
//require the autoload file
require dirname(__DIR__, 1) . '/autoload.php';

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Exceptions\SDKException;

//Initialize SDK
try {
    MobileMoney::initialize(
        MobileMoney::SANDBOX,
        <your_consumer_key>,
        <your_consumer_secret>,
        <your_api_key>
    );
    MobileMoney::setCallbackUrl(<your_callback_url>);
    MobileMoney::setSecurityLevel(SecurityLevel::STANDARD);
} catch (SDKException $exception) {
    print_r($exception->getMessage());
}
```

`MobileMoney` initialize method parameters are:

1.  `Environment` value can be one of the following
    -   `MobileMoney::SANDBOX` for Sandbox
    -   `MobileMoney::PRODUCTION` for Production
2.  `consumerKey` Consumer Key that you have generated from the API Developer Portal
3.  `consumerSecret` Consumer Secret that you have generated from the API Developer Portal
4.  `apiKey` API Key that you have generated from the API Developer Portal

Other functions available for `MobileMoney`:

-   `setCallbackUrl` - URL for your application where you want MobileMoney API to push data as a `PUT` request. This is optional; if you wish to specify different callback urls for different use cases, you can pass the callback url with each request.
-   `setSecurityLevel` value can be one of the following
    -   `SecurityLevel::DEVELOPMENT` - Uses Basic authentication for requests.
    -   `SecurityLevel::STANDARD` - Uses OAuth2 authentication for requests.

## Usage

### Initiate Merchant Payment

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

### Modules

-   [Merchant Payments](/docs/merchant_payments.md)
-   [Disbursements](/docs/disbursements.md)
-   [International Transfers](/docs/international_transfers.md)
-   P2P Transfers
-   Recurring Payments
-   Account Linking
-   Bill Payments
-   Agent Services
