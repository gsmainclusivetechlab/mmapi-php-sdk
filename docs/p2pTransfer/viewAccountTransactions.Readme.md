# Retrieve a Set of Transactions for an Account

1. `viewAccountTransactions([ identifierType => identifier ]) creates a GET request to /accounts/{identifierType}/{identifier}/transactions`

> `This endpoint returns transactions linked to a specific account where one identifier suffices to uniquely identify an account.`

1. `viewAccountTransactions([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ]) creates a GET request to /accounts/{AccountIdentifiers}/transactions`

> `This endpoint returns transactions linked to a specific account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\P2PTransfer\P2PTransfer;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = P2PTransfer::viewAccountTransactions($accountIdentifier, [
        'limit' => 5
    ]);

    /**
     *Execute the request
     */
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
Array(
    [data] => Array
        (
            [0] =>
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
        )

    [metadata] => mmpsdk\Common\Models\MetaData Object
        (
            [returnedCount:mmpsdk\Common\Models\MetaData:private] =>
            [availableCount:mmpsdk\Common\Models\MetaData:private] =>
        )
)

```
