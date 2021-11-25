This page will document the API classes and ways to properly use the API.

## Initialization

Example basic initialization with required values:

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
-   Call `createMerchantTransaction()` by passing the `Transaction` object and the callback url (optional) as parameters
    ```php
    use mmpsdk\MerchantPayment\MerchantPayment;
    $request = MerchantPayment::createMerchantTransaction(
        $transaction,
        'http://example.com/'
    );
    ```
-   If callback url is not supplied, the callback url defined during the SDK's initialization will be used. You'll have to rely on the polling API to detect the status of the request if you don't pass the callback URL and haven't configured a callback URL during SDK Initialization.

-   You can also use the method `setNotificationMethod()` to specifically mention the notification mechanism.

    ```php
    use mmpsdk\Common\Enums\NotificationMethod;
    $request->setNotificationMethod(NotificationMethod::POLLING);
    ```

-   After initialising, invoke the method `getClientCorrelationId()` to get the client correlation id.

    ```php
    $clientCorrelationId = $request->getClientCorrelationId();
    ```

-   Finally, to make the request, invoke the `execute()`

    ```php
    use mmpsdk\MerchantPayment\MerchantPayment;
    use mmpsdk\Common\Exceptions\SDKException;
    try {
        $request = MerchantPayment::createMerchantTransaction(
            $transaction,
            'http://example.com/'
        );
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
-   Call `createAuthorisationCode()` by passing the `AuthorisationCode` object, account identifiers and the callback url (optional) as parameters

    ```php
    use mmpsdk\MerchantPayment\MerchantPayment;
    $accountIdentifier = [
        'accountid' => 2000
    ];
    $request = MerchantPayment::createAuthorisationCode(
        $authorisationObj,
        $accountIdentifier,
        'http://example.com/'
    );
    ```

-   After initialising, invoke the method `getClientCorrelationId()` to get the client correlation id.

    ```php
    $clientCorrelationId = $request->getClientCorrelationId();
    ```

-   Finally, to make the request, invoke the `execute()`

    ```php
    use mmpsdk\MerchantPayment\MerchantPayment;
    use mmpsdk\Common\Exceptions\SDKException;
    try {
        $request = MerchantPayment::createAuthorisationCode(
            $authorisationObj,
            $accountIdentifier,
            'http://example.com/'
        );
        $clientCorrelationId = $request->getClientCorrelationId()
        print_r('client correlation id: ', $clientCorrelationId);
        $repsonse = $request->execute();
        print_r('response: ', $repsonse);
    } catch (SDKException $ex) {
        print_r('error message: ', $ex->getMessage());
        print_r('error object: ', $ex->getErrorObj());
    }
    ```

## Retrieve Account Transactions

Retrieves a set of transactions for a given account. The offset and limit filters are used by the caller to retrieve the transactions in sets.

-   Call `viewAccountTransactions()` by passing the account identifiers and and the filters (optional) as parameters

    ```php
    use mmpsdk\MerchantPayment\MerchantPayment;
    $accountIdentifier = [
        'accountid' => 2000
    ];
    $filter = ['limit' => 5, 'offset' => 0];
    $request = MerchantPayment::viewAccountTransactions(
        $accountIdentifier,
        $filter
    );
    ```

-   To make the request, invoke the `execute()`

    ```php
    use mmpsdk\MerchantPayment\MerchantPayment;
    use mmpsdk\Common\Exceptions\SDKException;
    try {
        $response = MerchantPayment::viewAccountTransactions(
            $accountIdentifier,
            $filter
        )->execute();
        print_r($response);
    } catch (SDKException $ex) {
        print_r($ex->getMessage());
        print_r($ex->getErrorObj());
    }
    ```

    Sample Response:

    ```
    Array
    (
        [0] => mmpsdk\Common\Models\Transaction Object
            (
                [transactionReference:protected] => REF-1619946469290
                [requestingOrganisationTransactionReference:protected] =>
                [originalTransactionReference:protected] =>
                [creditParty:protected] => Array
                    (
                        [0] => stdClass Object
                            (
                                [key] => accountid
                                [value] => 2000
                            )

                        [1] => stdClass Object
                            (
                                [key] => linkref
                                [value] => REF-1621839627337
                            )

                        [2] => stdClass Object
                            (
                                [key] => linkref
                                [value] => REF-1635445811066
                            )

                    )

                [debitParty:protected] => Array
                    (
                        [0] => stdClass Object
                            (
                                [key] => accountid
                                [value] => 2999
                            )

                    )

                [type:protected] => inttransfer
                [subType:protected] =>
                [transactionStatus:protected] => pending
                [amount:protected] => 100.00
                [currency:protected] => GBP
                [descriptionText:protected] =>
                [fees:protected] =>
                [geoCode:protected] =>
                [oneTimeCode:protected] =>
                [requestingOrganisation:protected] => mmpsdk\Common\Models\RequestingOrganisation Object
                    (
                        [requestingOrganisationIdentifierType:mmpsdk\Common\Models\RequestingOrganisation:private] => organisationid
                        [requestingOrganisationIdentifier:mmpsdk\Common\Models\RequestingOrganisation:private] => testorganisation
                        [hydratorStrategies:protected] =>
                        [availableCount:protected] =>
                    )

                [servicingIdentity:protected] =>
                [transactionReceipt:protected] =>
                [creationDate:protected] => 2021-05-02T10:07:49
                [modificationDate:protected] => 2021-05-02T10:07:49
                [requestDate:protected] => 2021-05-02T10:07:49
                [customData:protected] =>
                [metadata:protected] =>
                [hydratorStrategies:protected] =>
                [availableCount:protected] => 202
            )
        .
        .
        .
    )
    ```

-   The total number of records available that match the filters is returned in the response. To obtain the count, use the function `getTotalCount()` on any of the array items.
    ```php
    $totalCount = $response[0]->getTotalCount();
    ```

## Modules

-   [Common](/docs/common.md)
-   [Merchant Payments](/docs/merchant_payments.md)
-   [Disbursements](/docs/disbursements.md)
-   [International Transfers](/docs/international_transfers.md)
-   [P2P Transfers](/docs/p2p_transfers.md)
-   Recurring Payments
-   Account Linking
-   Bill Payments
-   Agent Services
