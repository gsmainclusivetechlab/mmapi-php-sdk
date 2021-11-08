# Merchant Payments

## Ref

|          Class          |                           Parameters                           |    Return    |                                          Description                                           |
| :---------------------: | :------------------------------------------------------------: | :----------: | :--------------------------------------------------------------------------------------------: |
|     InitiatePayment     |      Transaction $transaction, string $callBackUrl = null      | Transaction  |                    Initiate a merchant payment using the mobile money API.                     |
| CreateAuthorisationCode | array $accountIdentifier, AuthorisationCode $authorisationCode | RequestState | Generate an authorisation code which can in turn be used at a merchant to authorise a payment. |
|      PaymentRefund      |      Transaction $transaction, string $callBackUrl = null      | RequestState |                               Initiates the request for refund.                                |
