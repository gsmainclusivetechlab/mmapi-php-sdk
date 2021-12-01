# Recurring Payments

## Ref

|          Methods          |                                   Parameters                                    |       Return       |                             Description                             |
| :-----------------------: | :-----------------------------------------------------------------------------: | :----------------: | :-----------------------------------------------------------------: |
| createMerchantTransaction |              Transaction $transaction, string $callBackUrl = null               |    RequestState    |       Initiate a merchant payment using the mobile money API.       |
|  createRefundTransaction  |              Transaction $transaction, string $callBackUrl = null               |    RequestState    |                  Initiates the request for refund.                  |
| createAccountDebitMandate |              array $accountIdentifier, DebitMandate $debitMandate               |    RequestState    |                    Returns a specific quotation                     |
|  viewAccountDebitMandate  |               array $accountIdentifier, string $mandateReference                |    DebitMandate    | Returns a specific debit mandate using debit mandate reference id.  |
|     viewRequestState      |                           string $serverCorrelationId                           |    RequestState    | Retrieves the state of a request for a given Server Correlation Id. |
|       viewResponse        |                string $clientCorrelationId, Object $objRef=null                 |  Object or stdObj  | Retrieves a representation of the resource assuming that it exists. |
|  viewServiceAvailability  |                                       NA                                        |       stdObj       | To determine the availability of the service from the API provider. |
|    viewAccountBalance     |                  array $accountIdentifier, array $filter=null                   |      Balance       |           Returns the balances for the specified account.           |
|  viewAccountTransactions  |                  array $accountIdentifier, array $filter=null                   | Array(Transaction) |         Returns a set of transactions for a given account.          |
|      createReversal       | string $transactionReference, Reversal $reversal=null, string $callBackUrl=null |    RequestState    |       To reverse a merchant transaction in failure scenarios.       |
|      viewTransaction      |                          string $transactionReference                           |    Transaction     |             Get transaction object using reference id.              |
