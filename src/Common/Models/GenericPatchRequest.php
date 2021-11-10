<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

class GenericPatchRequest extends BaseModel
{
    public const REPLACE = 'replace';
    public const ADD = 'add';
    /**
     * @var string
     */
    private $op;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $value;

    /**
     * @return string|null
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * @param string|null $op
     *
     * @return GenericPatchRequest
     */
    public function setOp($op)
    {
        $this->op = $op;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     *
     * @return GenericPatchRequest
     */
    public function setPath($path)
    {
        $this->path = $path;

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
     * @return GenericPatchRequest
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'op' => $this->op,
            'path' => $this->path,
            'value' => $this->value
        ]);
    }
}
