<?php

namespace mmpsdk\Disbursement\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class BatchStatus
 * @package mmpsdk\Disbursement\Models
 */
class BatchStatus extends BaseModel
{
    /**
     * @var string
     */
    protected $transactionReference;

    /**
     * @var string
     */
    protected $requestingOrganisationTransactionReference;

    /**
     * @var array
     */
    protected $creditParty;

    /**
     * @var array
     */
    protected $debitParty;

    /**
     * @var string
     */
    protected $customData;

    /**
     * @return string|null
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

    /**
     * @param string|null $transactionReference
     *
     * @return BatchStatus
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestingOrganisationTransactionReference()
    {
        return $this->requestingOrganisationTransactionReference;
    }

    /**
     * @param string|null $requestingOrganisationTransactionReference
     *
     * @return BatchStatus
     */
    public function setRequestingOrganisationTransactionReference(
        $requestingOrganisationTransactionReference
    ) {
        $this->requestingOrganisationTransactionReference = $requestingOrganisationTransactionReference;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCreditParty()
    {
        return $this->creditParty;
    }

    /**
     * @param array|null $creditParty
     *
     * @return BatchStatus
     */
    public function setCreditParty($creditParty)
    {
        $this->creditParty = $creditParty;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getDebitParty()
    {
        return $this->debitParty;
    }

    /**
     * @param array|null $debitParty
     *
     * @return BatchStatus
     */
    public function setDebitParty($debitParty)
    {
        $this->debitParty = $debitParty;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param string|null $customData
     *
     * @return BatchStatus
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }
}
