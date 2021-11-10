# Disbursements

## Ref

|           Class           |                       Parameters                        |      Return      |                                   Description                                   |
| :-----------------------: | :-----------------------------------------------------: | :--------------: | :-----------------------------------------------------------------------------: |
|  ApproveBatchTransaction  |       string $batchId, string $callBackUrl = null       |   RequestState   |                     Update status of the batch transaction.                     |
| InitiateBulkDisbursement  | BatchTransaction $batchTransaction, $callBackUrl = null |   RequestState   | Make a bulk disbursement to a mobile money customer using the Mobile Money API. |
|   InitiateDisbursement    |  Transaction $transaction, string $callBackUrl = null   |   RequestState   |   Make a disbursement to a mobile money customer using the Mobile Money API.    |
| RetrieveBatchTransaction  |                     string $batchId                     | BatchTransaction |   Retrieve a representation of the batch transactions object using batch id.    |
| CompletedBatchTransaction |          string $batchId, array $filter = null          | BatchCompletion  |             Retrieve all completed transactions for a given batch.              |
| RejectedBatchTransaction  |          string $batchId, array $filter = null          |  BatchRejection  |              Retrieve all rejected transactions for a given batch.              |
