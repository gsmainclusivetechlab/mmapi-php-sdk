<?php

namespace mmpsdk\Common\Models;

use JsonSerializable;

/**
 * Class BaseModel
 * @package mmpsdk\Common\Models
 */
class BaseModel implements JsonSerializable
{
    public function __construct($value = [])
    {
        if (!empty($value)) {
            $this->hydrate($value);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $attribute => $value) {
            $method =
                'set' .
                str_replace(
                    ' ',
                    '',
                    ucwords(str_replace('_', ' ', $attribute))
                );
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function jsonSerialize()
    {
        return [];
    }

    protected function filterEmpty($array)
    {
        return array_filter($array, function ($val) {
            return !is_null($val);
        });
    }
}
