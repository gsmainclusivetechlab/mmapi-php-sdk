<?php

namespace mmpsdk\Common\Constants;

/**
 * Class Header
 * @package mmpsdk\Common\Constants
 */
class Header
{
    /**
     * Authorization Header
     */
    const AUTHORIZATION = 'Authorization',
        /**
         * Length of request content in 8-bit bytes
         */
        CONTENT_LENGTH = 'Content-Length',
        /**
         * Content Type
         */
        CONTENT_TYPE = 'Content-Type',
        /**
         * Used to pass pre-shared client's API key to the server.
         */
        X_API_KEY = 'X-API-Key',
        /**
         * Used to pass user’s access token
         */
        X_USER_BEARER = 'X-User-Bearer',
        /**
         * The date and time that the message was sent in HTTP-date format - RFC 7231
         */
        X_DATE = 'X-Date',
        /**
         * Used to pass pre-shared client's identifier to the server.
         */
        X_CLIENT_ID = 'X-Client-Id',
        /**
         * SHA-256 hex digest of the request content (encrypted or plain).
         */
        X_CONTENT_HASH = 'X-Content-Hash',
        /**
         * Header parameter to uniquely identify the request. Must be supplied as a GUID.
         */
        X_CORELLATION_ID = 'X-CorrelationID',
        /**
         * String containing the URL which should receive the Callback for asynchronous requests.
         */
        X_CALLBACK_URL = 'X-Callback-URL',
        /**
         * String containing the channel that was used to originate the request. For example, USSD, Web, App..
         */
        X_CHANNEL = 'X-Channel',
        /**
         * Contains an authentication credential of the end user (e.g. PIN, Password).
         */
        X_USER_CREDENTIAL_1 = 'X-User-Credential-1',
        /**
         * Contains an authentication credential of the end user (e.g. PIN, Password). Can be used when a second credential is required.
         */
        X_USER_CREDENTIAL_2 = 'X-User-Credential-2',
        X_RECORDS_AVAILABLE_COUNT = 'X-Records-Available-Count',
        X_RECORDS_RETURNED_COUNT = 'X-Records-Returned-Count';
}
