<?php

namespace mmpsdk\Common\Utils;

use Exception;
use mmpsdk\Common\Cache\AuthorizationCache;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Utils\EncDecUtil;
use mmpsdk\Common\Process\AccessToken;

class AuthUtil
{
    public static $EXPIRY_BUFFER_TIME = 5;

    public static function buildHeader(RequestUtil $request, $content = null)
    {
        switch (MobileMoney::getSecurityLevel()) {
            case SecurityLevel::NONE:
                return $request;
                break;

            case SecurityLevel::DEVELOPMENT:
                $request->httpHeader(
                    Header::X_API_KEY,
                    MobileMoney::getApiKey()
                );
                $request->httpHeader(
                    Header::AUTHORIZATION,
                    'Basic ' .
                        EncDecUtil::base64Encode(
                            MobileMoney::getConsumerKey() .
                                ':' .
                                MobileMoney::getConsumerSecret()
                        )
                );
                return $request;
                break;

            case SecurityLevel::STANDARD:
                $request->httpHeader(
                    Header::X_API_KEY,
                    MobileMoney::getApiKey()
                );
                $accessToken = self::getAccessToken();
                $request->httpHeader(
                    Header::AUTHORIZATION,
                    $accessToken->getAuthToken()
                );
                return $request;
                break;

            case SecurityLevel::ENHANCED:
                //TBD
                return $request;
                break;
            default:
                throw new Exception(
                    'Undefined security level:' .
                        MobileMoney::getSecurityLevel()
                );
        }
    }

    public static function checkExpiredToken($authToken)
    {
        $delta = time() - $authToken->getCreatedAt();
        // We use a buffer time when checking for token expiry to account
        // for API call delays and any delay between the time the token is
        // retrieved and subsequently used
        return $delta - self::$EXPIRY_BUFFER_TIME < $authToken->getExpiresIn()
            ? false
            : true;
    }

    public static function updateAccessToken()
    {
        $authResponse = AccessToken::execute();
        $accessTokenObj = new AuthToken();
        $accessTokenObj->setAuthToken($authResponse->access_token);
        $accessTokenObj->setExpiresIn($authResponse->expires_in);
        $accessTokenObj->setCreatedAt(time());
        AuthorizationCache::push($accessTokenObj, MobileMoney::getApiKey());
        MobileMoney::setAccessToken($accessTokenObj);
        return $accessTokenObj;
    }

    public static function getAccessToken()
    {
        // Check if we already have accessToken in Cache
        $token = MobileMoney::getAccessToken();
        if ($token && self::checkExpiredToken($token)) {
            return $token;
        }

        // Check for persisted data first
        $token = AuthorizationCache::pull(MobileMoney::getApiKey());

        // Check if Access Token is not null and has not expired.
        if ($token != null && self::checkExpiredToken($token)) {
            $token = null;
        }

        // If accessToken is Null, obtain a new token
        if ($token == null) {
            // Get a new one by making calls to API
            $token = self::updateAccessToken();
            AuthorizationCache::push($token, MobileMoney::getApiKey());
        }

        return $token;
    }
}
