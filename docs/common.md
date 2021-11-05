# Common APIs

## Ref

|            Class            |                                 Parameters                                  |                             Description                             |
| :-------------------------: | :-------------------------------------------------------------------------: | :-----------------------------------------------------------------: |
|       AccountBalance        |            Transaction $transaction, string $callBackUrl = false            |           Returns the balances for the specified account.           |
|         PollRequest         |                         string $serverCorrelationId                         | Retrieves the state of a request for a given Server Correlation Id. |
| RetrieveAccountTransactions |                   array $accountIdentifier, array $filter                   |         Returns a set of transactions for a given account.          |
|   RetrieveMissingResponse   |                 string $clientCorrelationId, Object $objRef                 | Retrieves a representation of the resource assuming that it exists. |
|     RetrieveTransaction     |                        string $transactionReference                         |             Get transaction object using reference id.              |
|     ServiceAvailability     |                                     NA                                      | To determine the availability of the service from the API provider. |
|     TransactionReversal     | string $transactionReference, Reversal $reversal, string $callBackUrl=false |       To reverse a merchant transaction in failure scenarios.       |
