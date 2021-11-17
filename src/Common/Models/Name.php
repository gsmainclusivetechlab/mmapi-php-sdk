<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Name
 * @package mmpsdk\Common\Models
 */
class Name extends BaseModel
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $middleName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $nativeName;

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return Name
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return Name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string|null $middleName
     *
     * @return Name
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return Name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     *
     * @return Name
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNativeName()
    {
        return $this->nativeName;
    }

    /**
     * @param string|null $nativeName
     *
     * @return Name
     */
    public function setNativeName($nativeName)
    {
        $this->nativeName = $nativeName;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'title' => $this->title,
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'fullName' => $this->fullName,
            'nativeName' => $this->nativeName
        ]);
    }
}
