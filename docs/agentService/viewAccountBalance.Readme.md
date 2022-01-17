# View Account Balance

1. `viewAccountBalance([ identifierType => identifier ]) creates a GET request to /accounts/{identifierType}/{identifier}/balance`

> `This endpoint returns the balance of an account where one identifier suffices to uniquely identify an account.`

1. `Here, viewAccountBalance([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ]) creates a GET request to /accounts/{AccountIdentifiers}/balance`

> `This endpoint returns the balance of an account where a single identifier is not sufficient to identify an account.`

3. `Here, viewAccountBalance() creates a GET request to /accounts/balance`

> `This endpoint returns the balance of an account. As the account is not passed as a parameter, the account is assumed to be that of the calling client.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\AgentService\AgentService;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AgentService::viewAccountBalance($accountIdentifier);

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
mmpsdk\Common\Models\Balance Object
(
    [accountStatus:mmpsdk\Common\Models\Balance:private] => available
    [currentBalance:mmpsdk\Common\Models\Balance:private] => 0.00
    [availableBalance:mmpsdk\Common\Models\Balance:private] => 0.00
    [reservedBalance:mmpsdk\Common\Models\Balance:private] => 0.00
    [unClearedBalance:mmpsdk\Common\Models\Balance:private] => 0.00
    [currency:mmpsdk\Common\Models\Balance:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
