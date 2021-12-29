<?php

namespace mmpsdk\AgentService\Models;

class Identity
{
    /**
     * @var string
     */
    private $identityId;

    /**
     * @var string
     */
    private $identityType;

    /**
     * @var string
     */
    private $identityStatus;

    /**
     * @var IdentityKyc
     */
    private $identityKyc;

    /**
     * @var string
     */
    private $accountRelationship;

    /**
     * @var string
     */
    private $kycVerificationStatus;

    /**
     * @var string
     */
    private $kycVerificationEntity;

    /**
     * @var string
     */
    private $kycLevel;

    /**
     * @var array
     */
    private $customData;

    /**
     * @return string|null
     */
    public function getIdentityId()
    {
        return $this->identityId;
    }

    /**
     * @param string|null $identityId
     *
     * @return Identity
     */
    public function setIdentityId($identityId)
    {
        $this->identityId = $identityId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdentityType()
    {
        return $this->identityType;
    }

    /**
     * @param string|null $identityType
     *
     * @return Identity
     */
    public function setIdentityType($identityType)
    {
        $this->identityType = $identityType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdentityStatus()
    {
        return $this->identityStatus;
    }

    /**
     * @param string|null $identityStatus
     *
     * @return Identity
     */
    public function setIdentityStatus($identityStatus)
    {
        $this->identityStatus = $identityStatus;

        return $this;
    }

    /**
     * @return IdentityKyc|null
     */
    public function getIdentityKyc()
    {
        return $this->identityKyc;
    }

    /**
     * @param IdentityKyc|null $identityKyc
     *
     * @return Identity
     */
    public function setIdentityKyc($identityKyc)
    {
        $this->identityKyc = $identityKyc;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountRelationship()
    {
        return $this->accountRelationship;
    }

    /**
     * @param string|null $accountRelationship
     *
     * @return Identity
     */
    public function setAccountRelationship($accountRelationship)
    {
        $this->accountRelationship = $accountRelationship;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKycVerificationStatus()
    {
        return $this->kycVerificationStatus;
    }

    /**
     * @param string|null $kycVerificationStatus
     *
     * @return Identity
     */
    public function setKycVerificationStatus($kycVerificationStatus)
    {
        $this->kycVerificationStatus = $kycVerificationStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKycVerificationEntity()
    {
        return $this->kycVerificationEntity;
    }

    /**
     * @param string|null $kycVerificationEntity
     *
     * @return Identity
     */
    public function setKycVerificationEntity($kycVerificationEntity)
    {
        $this->kycVerificationEntity = $kycVerificationEntity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKycLevel()
    {
        return $this->kycLevel;
    }

    /**
     * @param string|null $kycLevel
     *
     * @return Identity
     */
    public function setKycLevel($kycLevel)
    {
        $this->kycLevel = $kycLevel;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param array|null $customData
     *
     * @return Identity
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'identityKyc' => $this->identityKyc,
            'accountRelationship' => $this->accountRelationship,
            'kycVerificationStatus' => $this->kycVerificationStatus,
            'kycVerificationEntity' => $this->kycVerificationEntity,
            'kycLevel' => $this->kycLevel,
            'customData' => $this->customData
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'identityKyc',
            new \mmpsdk\Common\Models\KYCInformation()
        );
    }
}
