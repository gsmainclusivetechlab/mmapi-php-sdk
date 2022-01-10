# Retrieve Bill Payments for a Given Bill

1. `viewBillPayment([ identifierType => identifier ], billReference, $billPay) creates a GET request to /accounts/{identifierType}/{identifier}/bills/{billReference}/payments`

> `This endpoint allows for bill payments for a specific account to be returned where one identifier suffices to uniquely identify an account.`

2. `viewBillPayment([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], billReference, $billPay) creates a GET request to /accounts/{AccountIdentifiers}/bills/{billReference}/payments`

> `This endpoint allows for bill payments for a specific account to be returned where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\BillPayment\BillPayment;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = BillPayment::viewBillPayment(
        $accountIdentifier,
        '<<BILL-REFERENCE-HERE>>'
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
Array
(
    [data] => Array
        (
            [0] => mmpsdk\BillPayment\Models\BillPay Object
                (
                    [serviceProviderPaymentReference:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [requestingOrganisationTransactionReference:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [paymentType:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [billPaymentStatus:mmpsdk\BillPayment\Models\BillPay:private] => unpaid
                    [amountPaid:mmpsdk\BillPayment\Models\BillPay:private] => 0.99
                    [currency:mmpsdk\BillPayment\Models\BillPay:private] => GBP
                    [customerReference:mmpsdk\BillPayment\Models\BillPay:private] => customer ref 0001
                    [requestingOrganisation:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [supplementaryBillReferenceDetails:mmpsdk\BillPayment\Models\BillPay:private] => Array
                        (
                            [0] => mmpsdk\BillPayment\Models\BillReference Object
                                (
                                    [paymentReferenceType:mmpsdk\BillPayment\Models\BillReference:private] => type 1
                                    [paymentReferenceValue:mmpsdk\BillPayment\Models\BillReference:private] => value 1
                                    [hydratorStrategies:protected] =>
                                    [availableCount:protected] =>
                                )

                        )

                    [serviceProviderComment:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [serviceProviderNotification:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [creationDate:mmpsdk\BillPayment\Models\BillPay:private] => 2021-02-17T00:00:00
                    [modificationDate:mmpsdk\BillPayment\Models\BillPay:private] => 2021-02-18T08:20:58
                    [requestDate:mmpsdk\BillPayment\Models\BillPay:private] => 2021-02-18T08:21:27
                    [customData:mmpsdk\BillPayment\Models\BillPay:private] =>
                    [metadata:mmpsdk\BillPayment\Models\BillPay:private] =>
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
