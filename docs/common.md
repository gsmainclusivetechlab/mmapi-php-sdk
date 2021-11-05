# Common APIs

## Ref

| Class                                    | Parameters                                                                  | Description                                                                                    |
| ---------------------------------------- | --------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- |
| AccountBalance                           | Transaction $transaction, $callBackUrl = false                              | Initiate a merchant payment using the mobile money API.                                        |
| PollRequest                              | $accountIdentifier, AuthorisationCode $authorisationCode                    | Generate an authorisation code which can in turn be used at a merchant to authorise a payment. |
| PaymentRefundRetrieveAccountTransactions | Transaction $transaction, $callBackUrl = false                              | Initiates the request for refund.                                                              |
| RetrieveMissingResponse                  | string $clientCorrelationId, $objRef                                        | Retrieves a representation of the resource assuming that it exists.                            |
| RetrieveTransaction                      | $transactionReference                                                       | Get transaction object using reference id.                                                     |
| ServiceAvailability                      |                                                                             | To determine the availability of the service from the API provider.                            |
| TransactionReversal                      | string $transactionReference, Reversal $reversal = null, $callBackUrl=false | To reverse a merchant transaction in failure scenarios.                                        |
