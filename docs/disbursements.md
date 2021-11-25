# Disbursements

## Ref

|            Methods            |                                   Parameters                                    |       Return       |                                   Description                                   |
| :---------------------------: | :-----------------------------------------------------------------------------: | :----------------: | :-----------------------------------------------------------------------------: |
|    updateBatchTransaction     |                   string $batchId, string $callBackUrl = null                   |    RequestState    |                     Update status of the batch transaction.                     |
|    createBatchTransaction     |             BatchTransaction $batchTransaction, $callBackUrl = null             |    RequestState    | Make a bulk disbursement to a mobile money customer using the Mobile Money API. |
| createDisbursementTransaction |              Transaction $transaction, string $callBackUrl = null               |    RequestState    |   Make a disbursement to a mobile money customer using the Mobile Money API.    |
|     viewBatchTransaction      |                                 string $batchId                                 |  BatchTransaction  |   Retrieve a representation of the batch transactions object using batch id.    |
|     viewBatchCompletions      |                      string $batchId, array $filter = null                      |  BatchCompletion   |             Retrieve all completed transactions for a given batch.              |
|      viewBatchRejections      |                      string $batchId, array $filter = null                      |   BatchRejection   |              Retrieve all rejected transactions for a given batch.              |
|       viewRequestState        |                           string $serverCorrelationId                           |    RequestState    |       Retrieves the state of a request for a given Server Correlation Id.       |
|         viewResponse          |                string $clientCorrelationId, Object $objRef=null                 |  Object or stdObj  |       Retrieves a representation of the resource assuming that it exists.       |
|    viewServiceAvailability    |                                       NA                                        |       stdObj       |       To determine the availability of the service from the API provider.       |
|      viewAccountBalance       |                  array $accountIdentifier, array $filter=null                   |      Balance       |                 Returns the balances for the specified account.                 |
|    viewAccountTransactions    |                  array $accountIdentifier, array $filter=null                   | Array(Transaction) |               Returns a set of transactions for a given account.                |
|        createReversal         | string $transactionReference, Reversal $reversal=null, string $callBackUrl=null |    RequestState    |             To reverse a merchant transaction in failure scenarios.             |
|        viewTransaction        |                          string $transactionReference                           |    Transaction     |                   Get transaction object using reference id.                    |
