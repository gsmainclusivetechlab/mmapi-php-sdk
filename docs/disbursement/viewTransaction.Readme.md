# Retrieve a Transaction

`viewTransaction(transactionReference) creates a GET request to /transactions/{transactionReference}`

> `This endpoint returns the details of a transaction.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::viewTransaction('<<TRANSACTION-REFERENCE>>');

    /**
     *Execute the request
     */
    $repsonse = $request->execute();

    print_r($repsonse);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
mmpsdk\Common\Models\Transaction Object
(
    [transactionReference:protected] => REF-1636106992007
    [requestingOrganisationTransactionReference:protected] =>
    [originalTransactionReference:protected] =>
    [creditParty:protected] => Array
        (
            [0] => stdClass Object
                (
                    [key] => msisdn
                    [value] => +449999999
                )

            [1] => stdClass Object
                (
                    [key] => walletid
                    [value] => 1
                )

            [2] => stdClass Object
                (
                    [key] => accountid
                    [value] => 1
                )

            [3] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1583141449478
                )

            [4] => stdClass Object
                (
                    [key] => linkref
                    [value] => REF-1473082363913
                )

        )

    [debitParty:protected] => Array
        (
            [0] => stdClass Object
                (
                    [key] => msisdn
                    [value] => +44012345678
                )

            [1] => stdClass Object
                (
                    [key] => accountid
                    [value] => 3
                )

            [2] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1601985847787
                )
        )

    [type:protected] => merchantpay
    [subType:protected] =>
    [transactionStatus:protected] => completed
    [amount:protected] => 16.00
    [currency:protected] => USD
    [descriptionText:protected] =>
    [fees:protected] =>
    [geoCode:protected] =>
    [oneTimeCode:protected] =>
    [requestingOrganisation:protected] =>
    [servicingIdentity:protected] =>
    [transactionReceipt:protected] =>
    [creationDate:protected] => 2021-11-05T10:09:52
    [modificationDate:protected] => 2021-11-05T10:09:52
    [requestDate:protected] => 2021-11-05T10:09:52
    [customData:protected] =>
    [metadata:protected] =>
    [senderKyc:protected] =>
    [recipientKyc:protected] =>
    [internationalTransferInformation:protected] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)
```
