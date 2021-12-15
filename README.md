# mmapi-php-sdk

This SDK provides for an easy way to connect to [GSMA Mobile Money API](https://developer.mobilemoneyapi.io/1.2).

Please refer to the following documentation for installation instructions and usage information.

-   [API Documentation](https://developer.mobilemoneyapi.io/1.2)
-   [PHP SDK Documentation](docs/)
-   [How to use the test scripts](sample/)

## Requirements

-   PHP 5.4+
-   cURL PHP Extension
-   JSON PHP Extension

## Installation

### Composer

Update your composer.json file as per the example below and then run for this specific release `composer update`.

```json
{
    "require": {
        "php": ">=5.4",
        "mmpsdk/mmpsdk": "<version_number_here>"
    }
}
```

After installation through Composer, don't forget to require its autoloader in your script or bootstrap file:

```php
require 'vendor/autoload.php';
```

### Manual Installation

If you prefer not to use Composer, you can manually install the SDK.

-   Download the latest stable release of php-sdk
-   Extract php-sdk into your projects vendor folder
-   Require autoloader in your script or bootstrap file:
    ```php
    require 'path/to/sdk/autoload.php';
    ```

## Use Cases

-   [mmapi-php-sdk](#mmapi-php-sdk)
    -   [Requirements](#requirements)
    -   [Installation](#installation)
        -   [Composer](#composer)
        -   [Manual Installation](#manual-installation)
    -   [Use Cases](#use-cases)
        -   [Merchant Payments](#merchant-payments)
        -   [Disbursements](#disbursements)
    -   [Using the Test Scripts](#using-the-test-scripts)
    -   [Building & Testing the SDK](#building--testing-the-sdk)

### Merchant Payments

<table>
<thead>
  <tr>
    <th>Scenarios</th>
    <th>API</th>
    <th>Function</th>
    <th>Parameters</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Payee-Initiated Merchant Payment</td>
    <td><a href="docs/merchantPayment/createMerchantTransaction.Readme.md">Payee Initiated Merchant Payment</a></td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td rowspan="3">Payee-Initiated Merchant Payment using the Polling Method</td>
    <td><a href="docs/merchantPayment/createMerchantTransaction.Readme.md">Payee Initiated Merchant Payment</a></td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td><a href="docs/merchantPayment/viewRequestState.Readme.md">Poll to Determine the Request State</a></td>
    <td>viewRequestState</td>
    <td>string $serverCorrelationId</td>
  </tr>
  <tr>
    <td><a href="docs/merchantPayment/viewTransaction.Readme.md">Retrieve a Transaction</a></td>
    <td>viewTransaction</td>
    <td>string $transactionReference</td>
  </tr>
  <tr>
    <td>Payer-Initiated Merchant Payment</td>
    <td><a href="docs/merchantPayment/createMerchantTransaction.Readme.md">Payer Initiated Merchant Payment</a></td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td rowspan="3">Payee-Initiated Merchant Payment using a Pre-authorised Payment Code</td>
    <td><a href="docs/merchantPayment/createAuthorisationCode.Readme.md">Obtain an Authorisation Code</a></td>
    <td>createAuthorisationCode</td>
    <td>array $accountIdentifier, AuthorisationCode $authorisationCode</td>
  </tr>
  <tr>
    <td><a href="docs/merchantPayment/createMerchantTransaction.Readme.md">Perform a Merchant Payment</a></td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td><a href="docs/merchantPayment/viewAuthorisationCode.Readme.md">View An Authorisation Code</a></td>
    <td>viewAuthorisationCode</td>
    <td>string $accountIdentifier, string $authorisationCode</td>
  </tr>
  <tr>
    <td>Merchant Payment Refund</td>
    <td><a href="docs/merchantPayment/createRefundTransaction.Readme.md">Perform a Merchant Payment Refund</a></td>
    <td>createRefundTransaction</td>
    <td>Transaction $transaction, string $callBackUrl=null</td>
  </tr>
  <tr>
    <td>Merchant Payment Reversal</td>
    <td><a href="docs/merchantPayment/createReversal.Readme.md">Perform a Merchant Payment Reversal</a></td>
    <td>createReversal</td>
    <td>string $transactionReference, Reversal $reversal=null, string $callBackUrl=null</td>
  </tr>
  <tr>
    <td>Obtain a Merchant Balance</td>
    <td><a href="docs/merchantPayment/viewAccountBalance.Readme.md">Get an Account Balance</a></td>
    <td>viewAccountBalance</td>
    <td>array $accountIdentifier</td>
  </tr>
  <tr>
    <td>Retrieve Payments for a Merchant</td>
    <td><a href="docs/merchantPayment/viewAccountTransactions.Readme.md">Retrieve a Set of Transactions for an Account</a></td>
    <td>viewAccountTransactions</td>
    <td>array $accountIdentifier, array $filter=null</td>
  </tr>
  <tr>
    <td>Check for Service Availability</td>
    <td><a href="docs/merchantPayment/viewServiceAvailability.Readme.md">Check for Service Availability</a></td>
    <td>viewServiceAvailability</td>
    <td>NA</td>
  </tr>
  <tr>
    <td>Retrieve a Missing API Response</td>
    <td><a href="docs/merchantPayment/viewResponse.Readme.md">Retrieve a Missing Response</a></td>
    <td>viewResponse</td>
    <td>string $clientCorrelationId, Object $objRef=null</td>
  </tr>
</tbody>
</table>

### Disbursements

<table>
<thead>
  <tr>
    <th>Scenarios</th>
    <th>API</th>
    <th>Function</th>
    <th>Parameters</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Individual Disbursement</td>
    <td><a href="docs/disbursement/createDisbursementTransaction.Readme.md">Create a Individual Disbursement request </a></td>
    <td>createDisbursementTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td rowspan="4">Bulk Disbursement</td>
    <td><a href="docs/disbursement/createBatchTransaction.Readme.md">Create A Transaction Batch</a></td>
    <td>createBatchTransaction</td>
    <td>BatchTransaction $batchTransaction, $callBackUrl = null</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewBatchTransaction.Readme.md">View A Transaction Batch</a></td>
    <td>viewBatchTransaction</td>
    <td>string $batchId</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewBatchCompletions.Readme.md">View Batch Completions</a></td>
    <td>viewBatchCompletions</td>
    <td>string $batchId, array $filter = null</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewBatchRejections.Readme.md">View Batch Rejections</a></td>
    <td>viewBatchRejections</td>
    <td>string $batchId, array $filter = null</td>
  </tr>
  <tr>
    <td rowspan="5">Bulk Disbursement with Maker / Checker</td>
    <td><a href="docs/disbursement/createBatchTransaction.Readme.md">Create A Transaction Batch</a></td>
    <td>createBatchTransaction</td>
    <td>BatchTransaction $batchTransaction, $callBackUrl = null</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/updateBatchTransaction.Readme.md">Update A Transaction Batch</a></td>
    <td>updateBatchTransaction</td>
    <td>string $batchId, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewBatchTransaction.Readme.md">View A Transaction Batch</a></td>
    <td>viewBatchTransaction</td>
    <td>string $batchId</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewBatchCompletions.Readme.md">View Batch Completions</a></td>
    <td>viewBatchCompletions</td>
    <td> string $batchId, array $filter = null</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewBatchRejections.Readme.md">View Batch Rejections</a></td>
    <td>viewBatchRejections</td>
    <td>string $batchId, array $filter = null</td>
  </tr>
  <tr>
    <td rowspan="3">Individual Disbursement Using the Polling Method</td>
    <td><a href="docs/disbursement/createDisbursementTransaction.Readme.md">Create a Individual Disbursement request </a></td>
    <td>createDisbursementTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewRequestState.Readme.md">Poll to Determine the Request State</a></td>
    <td>viewRequestState</td>
    <td>string $serverCorrelationId</td>
  </tr>
  <tr>
    <td><a href="docs/disbursement/viewTransaction.Readme.md">Retrieve a Transaction</a></td>
    <td>viewTransaction</td>
    <td>string $transactionReference</td>
  </tr>
  <tr>
    <td>Disbursement Reversal</td>
    <td><a href="docs/disbursement/createReversal.Readme.md">Perform a Disbursement Reversal</a></td>
    <td>createReversal</td>
    <td>string $transactionReference, Reversal $reversal=null, string $callBackUrl=null</td>
  </tr>
  <tr>
    <td>Obtain a Disbursement Organisation Balance</td>
    <td><a href="docs/disbursement/viewAccountBalance.Readme.md">Get an Account Balance</a></td>
    <td>viewAccountBalance</td>
    <td>array $accountIdentifier</td>
  </tr>
  <tr>
    <td>Retrieve Transactions for a Disbursement Organisation</td>
    <td><a href="docs/disbursement/viewAccountTransactions.Readme.md">Retrieve a Set of Transactions for an Account</a></td>
    <td>viewAccountTransactions</td>
    <td>array $accountIdentifier, array $filter=null</td>
  </tr>
  <tr>
    <td>Check for Service Availability</td>
    <td><a href="docs/disbursement/viewServiceAvailability.Readme.md">Check for Service Availability</a></td>
    <td>viewServiceAvailability</td>
    <td>NA</td>
  </tr>
  <tr>
    <td>Retrieve a Missing API Response</td>
    <td><a href="docs/disbursement/viewResponse.Readme.md">Retrieve a Missing Response</a></td>
    <td>viewResponse</td>
    <td>string $clientCorrelationId, Object $objRef=null</td>
  </tr>
</tbody>
</table>

## Using the Test Scripts

You can find details on how to run the sample code [here](sample/)

## Building & Testing the SDK

Unit tests for the SDK are in the tests directory. These tests are mainly for SDK development.

-   Run `composer update --dev` to load the `PHPUnit` test library.
-   Copy the config.env.sample file to config.env and enter your credentials in the appropriate fields.
-   Run `composer run tests` to run the test suite.
