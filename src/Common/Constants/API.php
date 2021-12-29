<?php

namespace mmpsdk\Common\Constants;

/**
 * Class API
 * @package mmpsdk\Common\Constants
 */
class API
{
    const SANDBOX_BASE_URL = 'https://sandbox.mobilemoneyapi.io/simulator/v1.2/passthrough/mm',
        PRODUCTION_BASE_URL = 'https://sandbox.mobilemoneyapi.io/2/oauth/simulator/v1.2/mm',
        /**
         * Authentication
         * To generate an Access Token.
         */
        ACCESS_TOKEN = 'https://sandbox.mobilemoneyapi.io/v1/oauth/accesstoken',
        /**
         * Transactions
         * The Transactions APIs are used to support mobile money financial transaction use cases.
         */
        CREATE_TRANSACTION = '/transactions/type/{transactionType}',
        VIEW_TRANSACTION = '/transactions/{transactionReference}',
        UPDATE_TRANSACTION = '/transactions/{transactionReference}',
        CREATE_REVERSAL = '/transactions/{transactionReference}/reversals',
        CREATE_BATCH_TRANSACTION = '/batchtransactions',
        VIEW_BATCH_TRANSACTION = '/batchtransactions/{batchId}',
        UPDATE_BATCH_TRANSACTION = '/batchtransactions/{batchId}',
        VIEW_BATCH_REJECTIONS = '/batchtransactions/{batchId}/rejections',
        VIEW_BATCH_COMPLETEIONS = '/batchtransactions/{batchId}/completions',
        /**
         * Quotations
         * The Quotations APIs are used to obtain one or multiple quotes for a mobile money customer who wishes to transfer money.
         */
        CREATE_QUOTATION = '/quotations',
        VIEW_QUOTATION = '/quotations/{quotationReference}',
        /**
         * Accounts
         * The Accounts APIs are used to support a range of operations on a financial account resource and associated resources.
         */
        GENERAL_ACCOUNT = '/accounts/{identityType}', //POST, GET, PATCH
        GENERAL_ACCOUNT_IDENTIFIER = '/accounts/{identifierType}/{identifier}', //GET, PATCH
        GENERAL_ACCOUNT_ID = '/accounts/{accountId}',
        UPDATE_ACCOUNT_IDENDITY = '/accounts/{accountId}/identities/{identityId}',
        UPDATE_ACCOUNT_IDENDITY_BY_ID = '/accounts/{identifierType}/{identifier}/identities/{identityId}',
        VIEW_ACCOUNT_STATUS = '/accounts/{accountId}/status',
        VIEW_ACCOUNT_NAME = '/accounts/{accountId}/accountname',
        VIEW_ACCOUNT_BALANCE = '/accounts/{accountId}/balance',
        VIEW_ACCOUNT_BALANCE_CLIENT = '/accounts/balance',
        VIEW_ACCOUNT_TRANSACTIONS = '/accounts/{accountId}/transactions',
        VIEW_ACCOUNT_STATEMENTS = '/accounts/{accountId}/statemententries',
        VIEW_SPECIFIC_ACCOUNT_STATEMENT = '/statemententries/{transactionReference}',
        CREATE_ACCOUNT_DEBIT_MANDATE = '/accounts/{accountId}/debitmandates',
        VIEW_ACCOUNT_DEBIT_MANDATE = '/accounts/{accountId}/debitmandates/{debitMandateReference}',
        /**
         * Supporting
         * Supporting APIs
         */
        HEARTBEAT = '/heartbeat',
        VIEW_REQUEST_STATE = '/requeststates/{serverCorrelationId}',
        VIEW_RESPONSE = '/responses/{clientCorrelationId}',
        /**
         * Authorisation Codes
         * Allows a payer to generate a payment code which when presented to the payee, can be redeemed for an amount associated with the code.
         */
        AUTHORISATION_CODE = '/accounts/{accountId}/authorisationcodes',
        VIEW_AUTHORISATION_CODE = '/accounts/{accountId}/authorisationcodes/{authorisationCode}',
        CREATE_AUTHORISATION_CODE_VIA_IDENTIFIER = '/accounts/{identifierType}/{identifier}/authorisationcodes',
        /**
         * Account Links
         * The Links APIs are used to establish a link between two separate accounts on the client and provider systems.
         */
        CREATE_LINK = '/accounts/{accountId}/links',
        VIEW_LINK = '/accounts/{accountId}/links/{linkReference}',
        UPDATE_LINK = '/accounts/{accountId}/links/{linkReference}',
        /**
         * Bills
         * The Bills APIs allow a mobile money provider to allow customers to retrieve and pay bills.
         */
        VIEW_ACCOUNT_BILLS = '/accounts/{accountId}/bills',
        CREATE_BILL_PAYMENT = '/accounts/{accountId}/bills/{billReference}/payments',
        VIEW_BILL_PAYMENT = '/accounts/{accountId}/bills/{billReference}/payments';

    /**
     * Other API endpoints TBD
     */
}
