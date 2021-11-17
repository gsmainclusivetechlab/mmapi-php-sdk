<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class IdDocument
 * @package mmpsdk\Common\Models
 */
class IdDocument extends BaseModel
{
    /**
     * @var string
     */
    private $idType;

    /**
     * @var string
     */
    private $idNumber;

    /**
     * @var string
     */
    private $issueDate;

    /**
     * @var string
     */
    private $expiryDate;

    /**
     * @var string
     */
    private $issuer;

    /**
     * @var string
     */
    private $issuerPlace;

    /**
     * @var string
     */
    private $issuerCountry;

    /**
     * @var string
     */
    private $otherIdDescription;

    /**
     * @return string|null
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @param string|null $idType
     *
     * @return IdDocument
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @param string|null $idNumber
     *
     * @return IdDocument
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param string|null $issueDate
     *
     * @return IdDocument
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param string|null $expiryDate
     *
     * @return IdDocument
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param string|null $issuer
     *
     * @return IdDocument
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIssuerPlace()
    {
        return $this->issuerPlace;
    }

    /**
     * @param string|null $issuerPlace
     *
     * @return IdDocument
     */
    public function setIssuerPlace($issuerPlace)
    {
        $this->issuerPlace = $issuerPlace;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIssuerCountry()
    {
        return $this->issuerCountry;
    }

    /**
     * @param string|null $issuerCountry
     *
     * @return IdDocument
     */
    public function setIssuerCountry($issuerCountry)
    {
        $this->issuerCountry = $issuerCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOtherIdDescription()
    {
        return $this->otherIdDescription;
    }

    /**
     * @param string|null $otherIdDescription
     *
     * @return IdDocument
     */
    public function setOtherIdDescription($otherIdDescription)
    {
        $this->otherIdDescription = $otherIdDescription;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'idType' => $this->idType,
            'idNumber' => $this->idNumber,
            'issueDate' => $this->issueDate,
            'expiryDate' => $this->expiryDate,
            'issuer' => $this->issuer,
            'issuerPlace' => $this->issuerPlace,
            'issuerCountry' => $this->issuerCountry,
            'otherIdDescription' => $this->otherIdDescription
        ]);
    }
}
