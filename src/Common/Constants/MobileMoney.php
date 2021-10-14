<?php

namespace mmpsdk\Common\Constants;

use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Constants\API;

/**
 * This class is used to store all the mobile money api related Constants
 * that are common to all types of transactions
 *
 * Class MobileMoney
 * @package mmpsdk\Common\Constants
 */
class MobileMoney
{
    public const SANDBOX = 'SANDBOX';
    public const PRODUCTION = 'PRODUCTION';
    /**
     * @var bool
     */
    public static $isInitialized = false;

    /**
     * Used to set URLs(SANDBOX or PRODUCTION)
     * @var string
     */
    private static $environment = 'SANDBOX';

    /**
     * Timeout Constants
     * @var int
     */
    private static $connectTimeout = 30000; // 30 * 1000

    /**
     * @var string
     */
    private static $consumerKey;

    /**
     * @var string
     */
    private static $consumerSecret;

    /**
     * @var string
     */
    private static $apiKey;

    /**
     * @var string
     */
    private static $securityLevel = SecurityLevel::DEVELOPMENT;

    /**
     * callback url on which MMP will respond for api calls
     * @var string
     */
    private static $callbackUrl = '';

    /**
     * Cache file path
     * @var string
     */
    private static $cachePath = __DIR__ . '/../../../var/auth.cache';

    /**
     * Access Token Object
     * @var mixed
     */
    private static $accessToken = null;

    /** URLs */
    /**
     * @var string
     */
    private static $baseUrl = 'https://sandbox.mobilemoneyapi.io/simulator/v1.2/passthrough/mm';

    /**
     * @param string $environment
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $callbackUrl
     * @param string (SecurityLevel) $securityLevel
     * @throws Exception
     */
    public static function initialize(
        $environment,
        $consumerKey,
        $consumerSecret,
        $apiKey = ''
    ) {
        if (!self::$isInitialized) {
            self::$isInitialized = true;
            self::setEnvironment($environment);
            self::setConsumerKey($consumerKey);
            self::setConsumerSecret($consumerSecret);
            self::setApiKey($apiKey);
        }
    }

    /**
     * @return string
     */
    public static function getEnvironment()
    {
        return self::$environment;
    }

    /**
     * @return string
     */
    public static function getConsumerKey()
    {
        return self::$consumerKey;
    }

    /**
     * @return string
     */
    public static function getConsumerSecret()
    {
        return self::$consumerSecret;
    }

    /**
     * @return string
     */
    public static function getApiKey()
    {
        return self::$apiKey;
    }

    /**
     * @return string
     */
    public static function getSecurityLevel()
    {
        return self::$securityLevel;
    }

    /**
     * @return string
     */
    public static function getCallbackUrl()
    {
        return self::$callbackUrl;
    }

    /**
     * @return string
     */
    public static function getBaseUrl()
    {
        return self::$baseUrl;
    }

    /**
     * @return int
     */
    public static function getConnectionTimeout()
    {
        return self::$connectTimeout;
    }

    /**
     * @param string $callbackUrl
     */
    public static function getCachePath()
    {
        return self::$cachePath;
    }

    /**
     * @param string $callbackUrl
     */
    public static function getAccessToken()
    {
        return self::$accessToken;
    }

    /**
     * @param int $connectionTimeout
     */
    public static function setConnectionTimeout($connectionTimeout)
    {
        self::$connectTimeout = $connectionTimeout;
    }

    /**
     * @param string $consumerKey
     */
    public static function setConsumerKey($consumerKey)
    {
        self::$consumerKey = $consumerKey;
    }

    /**
     * @param string $consumerSecret
     */
    public static function setConsumerSecret($consumerSecret)
    {
        self::$consumerSecret = $consumerSecret;
    }

    /**
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * @param string $securityLevel
     */
    public static function setSecurityLevel($securityLevel)
    {
        self::$securityLevel = $securityLevel;
    }

    /**
     * @param string $callbackUrl
     */
    public static function setCallbackUrl($callbackUrl)
    {
        self::$callbackUrl = $callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public static function setCachePath($cachePath)
    {
        self::$cachePath = $cachePath;
    }

    /**
     * @param string $callbackUrl
     */
    public static function setAccessToken($accessToken)
    {
        self::$accessToken = $accessToken;
    }

    /**
     * @param string $environment
     * @throws Exception
     */
    public static function setEnvironment($environment)
    {
        self::$environment = $environment;
        if ($environment === self::SANDBOX) {
            self::$baseUrl = API::SANDBOX_BASE_URL;
        } elseif ($environment === self::PRODUCTION) {
            self::$baseUrl = API::PRODUCTION_BASE_URL;
        }
    }
}
