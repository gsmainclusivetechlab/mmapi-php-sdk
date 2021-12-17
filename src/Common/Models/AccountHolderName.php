<?php

namespace mmpsdk\Common\Models;

/**
 * Class AccountHolderName
 * @package mmpsdk\Common\Models
 */
class AccountHolderName extends BaseModel
{
    /**
     * @var Name
     */
    private $name;

    /**
     * @var string
     */
    private $lei;

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
     * @return AccountHolderName
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLei()
    {
        return $this->lei;
    }

    /**
     * @param string|null $lei
     *
     * @return sd
     */
    public function setLei($lei)
    {
        $this->lei = $lei;

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
