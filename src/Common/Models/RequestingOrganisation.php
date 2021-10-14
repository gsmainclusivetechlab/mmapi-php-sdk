<?php

namespace mmpsdk\Common\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class RequestingOrganisation
 * @package mmpsdk\Common\Models
 */
class RequestingOrganisation extends BaseModel
{
    /**
     * Identifies the identifier type of the requesting organisation.
     *
     * @var string
     */
    private $requestingOrganisationIdentifierType;

    /**
     * Contains the requesting organisation identifier.
     *
     * @var string
     */
    private $requestingOrganisationIdentifier;

    /**
     * Set the identifier type of the requesting organisation.
     *
     * @param string $requestingOrganisationIdentifierType
     * @return context
     */
    public function setRequestingOrganisationIdentifierType(
        $requestingOrganisationIdentifierType
    ) {
        $this->requestingOrganisationIdentifierType = $requestingOrganisationIdentifierType;
        return $this;
    }

    /**
     * Get the identifier type of the requesting organisation.
     *
     * @return string
     */
    public function getRequestingOrganisationIdentifierType()
    {
        return $this->requestingOrganisationIdentifierType;
    }

    /**
     * Set the requesting organisation identifier.
     *
     * @param string $requestingOrganisationIdentifier
     * @return context
     */
    public function setRequestingOrganisationIdentifier(
        $requestingOrganisationIdentifier
    ) {
        $this->requestingOrganisationIdentifier = $requestingOrganisationIdentifier;
        return $this;
    }

    /**
     * Get the requesting organisation identifier.
     *
     * @return string
     */
    public function getRequestingOrganisationIdentifier()
    {
        return $this->requestingOrganisationIdentifier;
    }

    public function jsonSerialize()
    {
        return array_filter(
            [
                'requestingOrganisationIdentifierType' =>
                    $this->requestingOrganisationIdentifierType,
                'requestingOrganisationIdentifier' =>
                    $this->requestingOrganisationIdentifier
            ],
            function ($val) {
                return !is_null($val);
            }
        );
    }
}
