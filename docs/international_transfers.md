# International Transfers

## Ref

|            Methods             |                      Parameters                      |    Return    |                                   Description                                   |
| :----------------------------: | :--------------------------------------------------: | :----------: | :-----------------------------------------------------------------------------: |
| createInternationalTransaction | Transaction $transaction, string $callBackUrl = null | RequestState |         Request an international quotation using the mobile money API.          |
|        createQuotation         |      Quotation $quotation, $callBackUrl = null       | RequestState | Make a bulk disbursement to a mobile money customer using the Mobile Money API. |
|         viewQuotation          |              string $quotationReference              |  Quotation   |                          Returns a specific quotation                           |
