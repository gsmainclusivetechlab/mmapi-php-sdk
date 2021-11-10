<?php

namespace mmpsdk\Common\Cache;

use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Constants\MobileMoney;

abstract class AuthorizationCache
{
    public static $CACHE_PATH = '/../../../var/auth.cache';

    /**
     * A pull method which would read the persisted data based on clientId.
     * If clientId is not provided, an array with all the tokens would be passed.
     *
     * @param array|null $config
     * @param string $clientId
     * @return mixed|null
     */
    public static function pull($clientId)
    {
        $tokens = null;
        $cachePath = self::cachePath();
        if (file_exists($cachePath)) {
            // Read from the file
            $cachedToken = file_get_contents($cachePath);
            if ($cachedToken) {
                $tokens = json_decode($cachedToken, true);
                if (
                    $clientId &&
                    is_array($tokens) &&
                    array_key_exists($clientId, $tokens)
                ) {
                    // If client Id is found, just send in that data only
                    return new AuthToken((object) $tokens[$clientId]);
                } elseif ($clientId) {
                    // If client Id is provided, but no key in persisted data found matching it.
                    return null;
                }
            }
        }
        return $tokens;
    }

    /**
     * Persists the data into a cache file provided in $CACHE_PATH
     *
     * @param array|null $config
     * @param      $clientId
     * @param      $accessToken
     * @param      $tokenCreateTime
     * @param      $tokenExpiresIn
     * @throws \Exception
     */
    public static function push(AuthToken $authObj, $clientId)
    {
        $cachePath = self::cachePath();
        if (
            !is_dir(dirname($cachePath)) &&
            !mkdir(dirname($cachePath), 0755, true)
        ) {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "Failed to create directory at: $cachePath"
            );
        }

        // Reads all the existing persisted data
        $tokens = self::pull($clientId);
        $tokens = $tokens ? $tokens : [];
        if (is_array($tokens)) {
            $tokens[$clientId] = [
                'clientId' => $clientId,
                'authToken' => $authObj->getAuthToken(),
                'createdAt' => $authObj->getCreatedAt(),
                'expiresIn' => $authObj->getExpiresIn()
            ];
        }
        if (!file_put_contents($cachePath, json_encode($tokens))) {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                'Failed to write cache'
            );
        }
    }

    /**
     * Returns the cache file path
     *
     * @param $config
     * @return string
     */
    public static function cachePath()
    {
        $cachePath = MobileMoney::getCachePath();
        return empty($cachePath) ? __DIR__ . self::$CACHE_PATH : $cachePath;
    }
}
