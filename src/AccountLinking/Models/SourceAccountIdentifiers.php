<?php

namespace mmpsdk\AccountLinking\Models;

class SourceAccountIdentifiers
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * @return string|null
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     *
     * @return SourceAccountIdentifiers
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     *
     * @return SourceAccountIdentifiers
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
