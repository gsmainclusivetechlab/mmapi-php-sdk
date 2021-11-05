# Merchant Payments

## Ref

| Class                   | Parameters                                               | Description                                                                                    |
| ----------------------- | -------------------------------------------------------- | ---------------------------------------------------------------------------------------------- |
| InitiatePayment         | Transaction $transaction, $callBackUrl = false           | Initiate a merchant payment using the mobile money API.                                        |
| CreateAuthorisationCode | $accountIdentifier, AuthorisationCode $authorisationCode | Generate an authorisation code which can in turn be used at a merchant to authorise a payment. |
| PaymentRefund           | Transaction $transaction, $callBackUrl = false           | Initiates the request for refund.                                                              |
