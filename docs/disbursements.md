# Disbursements

## Ref

|            Methods            |                       Parameters                        |      Return      |                                   Description                                   |
| :---------------------------: | :-----------------------------------------------------: | :--------------: | :-----------------------------------------------------------------------------: |
|    updateBatchTransaction     |       string $batchId, string $callBackUrl = null       |   RequestState   |                     Update status of the batch transaction.                     |
|    createBatchTransaction     | BatchTransaction $batchTransaction, $callBackUrl = null |   RequestState   | Make a bulk disbursement to a mobile money customer using the Mobile Money API. |
| createDisbursementTransaction |  Transaction $transaction, string $callBackUrl = null   |   RequestState   |   Make a disbursement to a mobile money customer using the Mobile Money API.    |
|     viewBatchTransaction      |                     string $batchId                     | BatchTransaction |   Retrieve a representation of the batch transactions object using batch id.    |
|     viewBatchCompletions      |          string $batchId, array $filter = null          | BatchCompletion  |             Retrieve all completed transactions for a given batch.              |
|      viewBatchRejections      |          string $batchId, array $filter = null          |  BatchRejection  |              Retrieve all rejected transactions for a given batch.              |
