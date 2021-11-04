<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Address
 * @package mmpsdk\Common\Models
 */
class Address extends BaseModel
{
    /**
     * @var string
     */
    private $addressLine1;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $addressLine3;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $stateProvince;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $country;

    /**
     * @return string|null
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string|null $addressLine1
     *
     * @return Address
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string|null $addressLine2
     *
     * @return Address
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @param string|null $addressLine3
     *
     * @return Address
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateProvince()
    {
        return $this->stateProvince;
    }

    /**
     * @param string|null $stateProvince
     *
     * @return Address
     */
    public function setStateProvince($stateProvince)
    {
        $this->stateProvince = $stateProvince;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     *
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     *
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'addressLine1' => $this->addressLine1,
            'addressLine2' => $this->addressLine2,
            'addressLine3' => $this->addressLine3,
            'city' => $this->city,
            'stateProvince' => $this->stateProvince,
            'postalCode' => $this->postalCode,
            'country' => $this->country
        ]);
    }
}
