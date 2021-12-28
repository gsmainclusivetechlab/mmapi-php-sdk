<?php

namespace mmpsdk\Common\Models;
use mmpsdk\Common\Models\BaseModel;

/**
 * Class PatchData
 * @package mmpsdk\Common\Models
 */
class PatchData extends BaseModel
{
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
     * @return PatchData
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
     * @return PatchData
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
     * @return PatchData
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

