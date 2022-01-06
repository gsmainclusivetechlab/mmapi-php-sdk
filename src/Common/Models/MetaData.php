<?php

namespace mmpsdk\Common\Models;

// use mmpsdk\Common\Models\BaseModel;

/**
 * Class MetaData
 * @package mmpsdk\Common\Models
 */
class MetaData
{
    private $returnedCount;
    private $availableCount;

    public function setReturnedCount($returnedCount)
    {
        $this->returnedCount = $returnedCount;
        return $this;
    }
    public function getReturnedCount()
    {
        return $this->returnedCount;
    }
    public function setAvailableCount($availableCount)
    {
        $this->availableCount = $availableCount;
        return $this;
    }
    public function getAvailableCount()
    {
        return $this->availableCount;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'returnedCount' => $this->returnedCount,
            'availableCount' => $this->availableCount
        ]);
    }
}
