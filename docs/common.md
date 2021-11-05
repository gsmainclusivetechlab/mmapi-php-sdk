# Common APIs

## Ref

|            Class            |                                    Parameters                                    |       Return       |                             Description                             |
| :-------------------------: | :------------------------------------------------------------------------------: | :----------------: | :-----------------------------------------------------------------: |
|       AccountBalance        |              Transaction $transaction, string $callBackUrl = false               |      Balance       |           Returns the balances for the specified account.           |
|         PollRequest         |                           string $serverCorrelationId                            |    RequestState    | Retrieves the state of a request for a given Server Correlation Id. |
| RetrieveAccountTransactions |                   array $accountIdentifier, array $filter=null                   | Array(Transaction) |         Returns a set of transactions for a given account.          |
|   RetrieveMissingResponse   |                 string $clientCorrelationId, Object $objRef=null                 |  Object or stdObj  | Retrieves a representation of the resource assuming that it exists. |
|     RetrieveTransaction     |                           string $transactionReference                           |    Transaction     |             Get transaction object using reference id.              |
|     ServiceAvailability     |                                        NA                                        |       stdObj       | To determine the availability of the service from the API provider. |
|     TransactionReversal     | string $transactionReference, Reversal $reversal=null, string $callBackUrl=false |    RequestState    |       To reverse a merchant transaction in failure scenarios.       |
