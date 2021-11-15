# Merchant Payments

## Ref

|          Methods          |                           Parameters                           |      Return       |                                          Description                                           |
| :-----------------------: | :------------------------------------------------------------: | :---------------: | :--------------------------------------------------------------------------------------------: |
| createMerchantTransaction |      Transaction $transaction, string $callBackUrl = null      |    Transaction    |                    Initiate a merchant payment using the mobile money API.                     |
|  createAuthorisationCode  | array $accountIdentifier, AuthorisationCode $authorisationCode |   RequestState    | Generate an authorisation code which can in turn be used at a merchant to authorise a payment. |
|  createRefundTransaction  |      Transaction $transaction, string $callBackUrl = null      |   RequestState    |                               Initiates the request for refund.                                |
|   viewAuthorisationCode   |      string $accountIdentifier, string $authorisationCode      | AuthorisationCode |                  Returns a specific Authorisation Code linked to an account.                   |
