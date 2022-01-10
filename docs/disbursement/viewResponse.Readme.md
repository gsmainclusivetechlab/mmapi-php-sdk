# Retrieve a Missing Response

`viewResponse(clientCorrelationId) creates a GET request to /responses/{clientCorrelationId}`

> `This endpoint returns a specific response.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Models\Transaction;

try {
    /**
     *Reference of the required object. Response will be of type stdObject if not provided
     */
    $objectReference = new Transaction();

    /**
     * Construct request object and set desired parameters
     */
    $request = MerchantPayment::viewResponse(
        '<<CLIENT-CORRELATION-ID>>',
        $objectReference
    );

    /**
     *Execute the request
     */
    $repsonse = $request->execute();

    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
mmpsdk\Common\Models\Transaction Object
(
    [transactionReference:protected] => REF-1635141516175
    [requestingOrganisationTransactionReference:protected] =>
    [originalTransactionReference:protected] =>
    [creditParty:protected] => Array
        (
            [0] => stdClass Object
                (
                    [key] => accountid
                    [value] => 2999
                )

            [1] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907197912
                )

            [2] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907232832
                )

            [3] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907265888
                )

            [4] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907412029
                )

            [5] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907483978
                )

            [6] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637909732171
                )

            [7] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1638330257762
                )

            [8] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1638360515423
                )

            [9] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1638444910612
                )

            [10] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1639023787539
                )

        )

    [debitParty:protected] => Array
        (
            [0] => stdClass Object
                (
                    [key] => accountid
                    [value] => 2999
                )

            [1] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907197912
                )

            [2] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907232832
                )

            [3] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907265888
                )

            [4] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907412029
                )

            [5] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907483978
                )

            [6] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637909732171
                )

            [7] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1638330257762
                )

            [8] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1638360515423
                )

            [9] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1638444910612
                )

            [10] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1639023787539
                )

        )

    [type:protected] => merchantpay
    [subType:protected] =>
    [transactionStatus:protected] => pending
    [amount:protected] => 200.00
    [currency:protected] => RWF
    [descriptionText:protected] =>
    [fees:protected] =>
    [geoCode:protected] =>
    [oneTimeCode:protected] =>
    [requestingOrganisation:protected] =>
    [servicingIdentity:protected] =>
    [transactionReceipt:protected] =>
    [creationDate:protected] => 2021-10-25T06:58:36
    [modificationDate:protected] => 2021-10-25T06:58:36
    [requestDate:protected] => 2021-10-25T06:58:36
    [customData:protected] =>
    [metadata:protected] =>
    [senderKyc:protected] =>
    [recipientKyc:protected] =>
    [internationalTransferInformation:protected] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)
```
