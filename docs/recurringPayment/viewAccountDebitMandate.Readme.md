# Retrieve a Debit Mandate

1. `viewAccountDebitMandate([ identifierType => identifier ], debitMandateReference) creates a GET request to /accounts/{identifierType}/{identifier}/debitmandates/{mandateReference}`

> `This endpoint returns a specific debit mandate linked to an account where one identifier suffices to uniquely identify an account.`

2. `Here, viewAccountDebitMandate([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], debitMandateReference) creates a GET request to /accounts/{Account Identifiers}/debitmandates/{mandateReference}`

> `This endpoint returns a specific debit mandate linked to an account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\RecurringPayment\RecurringPayment;

$debitMandateReference = '<<DEBITMANDATE-REFERENCE-HERE>>';
$accountIdentifier = [
    'accountid' => '2000'
];

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = RecurringPayment::viewAccountDebitMandate(
        $accountIdentifier,
        $debitMandateReference
    );

    /**
     *Execute the request
     */
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
```

### Example Output

```php
mmpsdk\RecurringPayment\Models\DebitMandate Object
(
    [mandateReference:mmpsdk\RecurringPayment\Models\DebitMandate:private] => REF-1638258098398
    [payee:mmpsdk\RecurringPayment\Models\DebitMandate:private] => Array
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

        )

    [mandateStatus:mmpsdk\RecurringPayment\Models\DebitMandate:private] => active
    [startDate:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 2018-07-03
    [amountLimit:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 1000.00
    [currency:mmpsdk\RecurringPayment\Models\DebitMandate:private] => GBP
    [endDate:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 2028-07-03
    [frequencyType:mmpsdk\RecurringPayment\Models\DebitMandate:private] => sixmonths
    [numberOfPayments:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 2
    [requestingOrganisation:mmpsdk\RecurringPayment\Models\DebitMandate:private] =>
    [creationDate:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 2021-11-30T07:41:38
    [modificationDate:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 2021-11-30T07:41:38
    [requestDate:mmpsdk\RecurringPayment\Models\DebitMandate:private] => 2018-07-03T10:43:27
    [customData:mmpsdk\RecurringPayment\Models\DebitMandate:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => keytest
                    [value] => keyvalue
                )

        )

    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
