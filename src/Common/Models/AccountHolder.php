<?php

namespace mmpsdk\Common\Models;

/**
 * Class AccountHolder
 * @package mmpsdk\Common\Models
 */
class AccountHolder extends BaseModel
{
    /**
     * @var Name
     */
    private $name;

    /**
     * @return Name|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Name|null $name
     *
     * @return AccountHolder
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'name' => $this->name
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy('name', new \mmpsdk\Common\Models\Name());
    }
}
