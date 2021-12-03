<?php

namespace mmpsdk\AccountLinking\Models;

use mmpsdk\Common\Models\BaseModel;
use mmpsdk\Common\Utils\CommonUtil;

class AccountLink extends BaseModel
{
    /**
     * @var string
     */
    private $linkReference;

    /**
     * @var array
     */
    private $sourceAccountIdentifiers;

    /**
     * @var string
     */
    private $mode;

    /**
     * @var string
     */
    private $status;

    /**
     * @var RequestingOrganisation
     */
    private $requestingOrganisation;

    /**
     * @var string
     */
    private $creationDate;

    /**
     * @var string
     */
    private $modificationDate;

    /**
     * @var string
     */
    private $requestDate;

    /**
     * @var array
     */
    private $customData;

    /**
     * @return string|null
     */
    public function getLinkReference()
    {
        return $this->linkReference;
    }

    /**
     * @param string|null $linkReference
     *
     * @return AccountLinking
     */
    public function setLinkReference($linkReference)
    {
        $this->linkReference = $linkReference;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getSourceAccountIdentifiers()
    {
        return $this->sourceAccountIdentifiers;
    }

    /**
     * @param array|null $sourceAccountIdentifiers
     *
     * @return AccountLinking
     */
    public function setSourceAccountIdentifiers($sourceAccountIdentifiers)
    {
        $this->sourceAccountIdentifiers = $sourceAccountIdentifiers;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string|null $mode
     *
     * @return AccountLinking
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     *
     * @return AccountLinking
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return RequestingOrganisation|null
     */
    public function getRequestingOrganisation()
    {
        return $this->requestingOrganisation;
    }

    /**
     * @param RequestingOrganisation|null $requestingOrganisation
     *
     * @return AccountLinking
     */
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param string|null $creationDate
     *
     * @return AccountLinking
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param string|null $modificationDate
     *
     * @return AccountLinking
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @param string|null $requestDate
     *
     * @return AccountLinking
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

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
     * @return AccountLinking
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'sourceAccountIdentifiers' => CommonUtil::DeserializeToSupportObject(
                $this->sourceAccountIdentifiers
            ),
            'status' => $this->status,
            'mode' => $this->mode,
            'requestingOrganisation' => $this->requestingOrganisation,
            'customData' => CommonUtil::DeserializeToSupportObject(
                $this->customData
            )
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'requestingOrganisation',
            new \mmpsdk\Common\Models\RequestingOrganisation()
        );
    }
}
