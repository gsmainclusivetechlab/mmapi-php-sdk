<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class KYCInformation
 * @package mmpsdk\Common\Models
 */
class KYCInformation extends BaseModel
{
    /**
     * @var string
     */
    private $birthCountry;

    /**
     * @var string
     */
    private $dateOfBirth;

    /**
     * @var string
     */
    private $contactPhone;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var string
     */
    private $employerName;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var IdDocument
     */
    private $idDocument;

    /**
     * @var string
     */
    private $nationality;

    /**
     * @var Address
     */
    private $postalAddress;

    /**
     * @var string
     */
    private $occupation;

    /**
     * @var Name
     */
    private $subjectName;

    /**
     * @return string|null
     */
    public function getBirthCountry()
    {
        return $this->birthCountry;
    }

    /**
     * @param string|null $birthCountry
     *
     * @return KYCInformation
     */
    public function setBirthCountry($birthCountry)
    {
        $this->birthCountry = $birthCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string|null $dateOfBirth
     *
     * @return KYCInformation
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * @param string|null $contactPhone
     *
     * @return KYCInformation
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string|null $emailAddress
     *
     * @return KYCInformation
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmployerName()
    {
        return $this->employerName;
    }

    /**
     * @param string|null $employerName
     *
     * @return KYCInformation
     */
    public function setEmployerName($employerName)
    {
        $this->employerName = $employerName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     *
     * @return KYCInformation
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return IdDocument|null
     */
    public function getIdDocument()
    {
        return $this->idDocument;
    }

    /**
     * @param IdDocument|null $idDocument
     *
     * @return KYCInformation
     */
    public function setIdDocument($idDocument)
    {
        $this->idDocument = $idDocument;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string|null $nationality
     *
     * @return KYCInformation
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return Address|null
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * @param Address|null $postalAddress
     *
     * @return KYCInformation
     */
    public function setPostalAddress($postalAddress)
    {
        $this->postalAddress = $postalAddress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param string|null $occupation
     *
     * @return KYCInformation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * @return Name|null
     */
    public function getSubjectName()
    {
        return $this->subjectName;
    }

    /**
     * @param Name|null $subjectName
     *
     * @return KYCInformation
     */
    public function setSubjectName($subjectName)
    {
        $this->subjectName = $subjectName;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'birthCountry' => $this->birthCountry,
            'dateOfBirth' => $this->dateOfBirth,
            'contactPhone' => $this->contactPhone,
            'emailAddress' => $this->emailAddress,
            'employerName' => $this->employerName,
            'gender' => $this->gender,
            'idDocument' => $this->idDocument,
            'nationality' => $this->nationality,
            'postalAddress' => $this->postalAddress,
            'occupation' => $this->occupation,
            'subjectName' => $this->subjectName
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'idDocument',
            new \mmpsdk\Common\Models\IdDocument()
        );
        $this->addHydratorStrategy(
            'postalAddress',
            new \mmpsdk\Common\Models\Address()
        );
        $this->addHydratorStrategy(
            'subjectName',
            new \mmpsdk\Common\Models\Name()
        );
    }
}
