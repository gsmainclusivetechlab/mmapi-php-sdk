# Common APIs

## Ref

|         Function          |                                   Parameters                                    |       Return       |                             Description                             |
| :-----------------------: | :-----------------------------------------------------------------------------: | :----------------: | :-----------------------------------------------------------------: |
|    viewAccountBalance     |              Transaction $transaction, string $callBackUrl = null               |      Balance       |           Returns the balances for the specified account.           |
|     viewRequestState      |                           string $serverCorrelationId                           |    RequestState    | Retrieves the state of a request for a given Server Correlation Id. |
|  viewAccountTransaction   |                  array $accountIdentifier, array $filter=null                   | Array(Transaction) |         Returns a set of transactions for a given account.          |
|       viewResponse        |                string $clientCorrelationId, Object $objRef=null                 |  Object or stdObj  | Retrieves a representation of the resource assuming that it exists. |
|      viewTransaction      |                          string $transactionReference                           |    Transaction     |             Get transaction object using reference id.              |
|  viewServiceAvailability  |                                       NA                                        |       stdObj       | To determine the availability of the service from the API provider. |
| createReversalTransaction | string $transactionReference, Reversal $reversal=null, string $callBackUrl=null |    RequestState    |       To reverse a merchant transaction in failure scenarios.       |
