<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Error
 * @package mmpsdk\Common\Models
 */
class AuthToken extends BaseModel
{
    private $authToken;
    private $expiresIn;
    private $createdAt;

    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }
    public function getAuthToken()
    {
        return $this->authToken;
    }
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function jsonSerialize()
    {
        return array_filter([
            "authToken" => $this->authToken,
            "expiresIn" => $this->expiresIn,
            "createdAt" => $this->createdAt
        ], function ($val) {
            return !is_null($val);
        });
    }
}
