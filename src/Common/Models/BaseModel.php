<?php

namespace mmpsdk\Common\Models;

use JsonSerializable;

/**
 * Class BaseModel
 * @package mmpsdk\Common\Models
 */
class BaseModel implements JsonSerializable
{
    protected $hydratorStrategies;

    public function __construct($value = [])
    {
        if (!empty($value)) {
            $this->hydrate($value);
        }
    }

    private function hydrateAttribute($attribute, $value)
    {
        if (isset($this->hydratorStrategies[$attribute])) {
            $strategy = $this->hydratorStrategies[$attribute];
            $value = $strategy->hydrate($value);
        }
        $method =
            'set' .
            str_replace(' ', '', ucwords(str_replace('_', ' ', $attribute)));
        if (is_callable([$this, $method])) {
            $this->$method($value);
        }
    }

    /**
     * Fill the object with data
     *
     * @param object $data
     * @param $context
     * @return self
     */
    public function hydrate($data, $context = null)
    {
        if (is_array($data) && !empty($data)) {
            $objectArray = [];
            foreach ($data as $item) {
                array_push($objectArray, $this->hydrate($item, new $this()));
            }
            return $objectArray;
        } elseif ($data) {
            $this->hydratorStrategies();
            $context = $context ? $context : $this;
            foreach ($data as $attribute => $value) {
                $context->hydrateAttribute($attribute, $value);
            }
            return $context;
        }
        return $this;
    }

    public function jsonSerialize()
    {
        return [];
    }

    public function addHydratorStrategy(string $name, $obj)
    {
        $this->hydratorStrategies[$name] = $obj;
        return $this;
    }

    public function hydratorStrategies()
    {
    }

    protected function filterEmpty($array)
    {
        return array_filter($array, function ($val) {
            return !is_null($val);
        });
    }
}
