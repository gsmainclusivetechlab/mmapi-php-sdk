# Account Linking

## Ref

|          Methods          |                                   Parameters                                    |       Return       |                             Description                             |
| :-----------------------: | :-----------------------------------------------------------------------------: | :----------------: | :-----------------------------------------------------------------: |
|     createAccountLink     |     array $accountIdentifier, AccountLink $accountLink, $callBackUrl = null     |    RequestState    |                Establish an Account to Account Link.                |
|      ViewAccountLink      |              array $accountIdentifier, string $quotationReference               |    AccountLink     |              Read a specific link for a given account.              |
| createTransferTransaction |              Transaction $transaction, string $callBackUrl = null               |    RequestState    |                    To make transfer transaction.                    |
|     viewRequestState      |                           string $serverCorrelationId                           |    RequestState    | Retrieves the state of a request for a given Server Correlation Id. |
|       viewResponse        |                string $clientCorrelationId, Object $objRef=null                 |  Object or stdObj  | Retrieves a representation of the resource assuming that it exists. |
|  viewServiceAvailability  |                                       NA                                        |       stdObj       | To determine the availability of the service from the API provider. |
|    viewAccountBalance     |                  array $accountIdentifier, array $filter=null                   |      Balance       |           Returns the balances for the specified account.           |
|  viewAccountTransactions  |                  array $accountIdentifier, array $filter=null                   | Array(Transaction) |         Returns a set of transactions for a given account.          |
|      createReversal       | string $transactionReference, Reversal $reversal=null, string $callBackUrl=null |    RequestState    |       To reverse a merchant transaction in failure scenarios.       |
|      viewTransaction      |                          string $transactionReference                           |    Transaction     |             Get transaction object using reference id.              |
