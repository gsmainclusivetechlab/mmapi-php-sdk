<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class AccountIdentifier
 * @package mmpsdk\Common\Models
 */
class AccountIdentifier extends BaseModel
{
    /**
     * Provides the account identifier type.
     *
     * @var string
     */
    private $key;

    /**
     * Provides the account identifier type value.
     *
     * @var string
     */
    private $value;

    /**
     * Set the account identifier type.
     *
     * @param string $key
     * @return context
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Get the account identifier type.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the account identifier type value.
     *
     * @param string $value
     * @return context
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the account identifier type value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        return array_filter(
            [
                'key' => $this->key,
                'value' => $this->value
            ],
            function ($val) {
                return !is_null($val);
            }
        );
    }
}
