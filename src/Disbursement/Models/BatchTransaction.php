<?php

namespace mmpsdk\Disbursement\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class BatchTransaction
 * @package mmpsdk\Disbursement\Models
 */
class BatchTransaction extends BaseModel
{
    /**
     * @var string
     */
    private $batchID;

    /**
     * @var string
     */
    private $batchStatus;

    /**
     * @var array
     */
    private $transactions;

    /**
     * @var string
     */
    private $approvalDate;

    /**
     * @var string
     */
    private $batchTitle;

    /**
     * @var string
     */
    private $batchDescription;

    /**
     * @var RequestingOrganisation
     */
    private $requestingOrganisation;

    /**
     * @var string
     */
    private $scheduledStartDate;

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
     * @var string
     */
    private $completionDate;

    /**
     * @var bool
     */
    private $processingFlag;

    /**
     * @var int
     */
    private $completedCount;

    /**
     * @var int
     */
    private $parsingSuccessCount;

    /**
     * @var int
     */
    private $rejectionCount;

    /**
     * @var string
     */
    private $creationDate;

    /**
     * @var array
     */
    private $metadata;

    /**
     * @return string|null
     */
    public function getBatchID()
    {
        return $this->batchID;
    }

    /**
     * @param string|null $batchID
     *
     * @return BatchTransaction
     */
    public function setBatchID($batchID)
    {
        $this->batchID = $batchID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBatchStatus()
    {
        return $this->batchStatus;
    }

    /**
     * @param string|null $batchStatus
     *
     * @return BatchTransaction
     */
    public function setBatchStatus($batchStatus)
    {
        $this->batchStatus = $batchStatus;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param array|null $transactions
     *
     * @return BatchTransaction
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApprovalDate()
    {
        return $this->approvalDate;
    }

    /**
     * @param string|null $approvalDate
     *
     * @return BatchTransaction
     */
    public function setApprovalDate($approvalDate)
    {
        $this->approvalDate = $approvalDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBatchTitle()
    {
        return $this->batchTitle;
    }

    /**
     * @param string|null $batchTitle
     *
     * @return BatchTransaction
     */
    public function setBatchTitle($batchTitle)
    {
        $this->batchTitle = $batchTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBatchDescription()
    {
        return $this->batchDescription;
    }

    /**
     * @param string|null $batchDescription
     *
     * @return BatchTransaction
     */
    public function setBatchDescription($batchDescription)
    {
        $this->batchDescription = $batchDescription;
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
     * @return BatchTransaction
     */
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getScheduledStartDate()
    {
        return $this->scheduledStartDate;
    }

    /**
     * @param string|null $scheduledStartDate
     *
     * @return BatchTransaction
     */
    public function setScheduledStartDate($scheduledStartDate)
    {
        $this->scheduledStartDate = $scheduledStartDate;
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
     * @return BatchTransaction
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
     * @return BatchTransaction
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
     * @return BatchTransaction
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompletionDate()
    {
        return $this->completionDate;
    }

    /**
     * @param string|null $completionDate
     *
     * @return BatchTransaction
     */
    public function setCompletionDate($completionDate)
    {
        $this->completionDate = $completionDate;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isProcessingFlag()
    {
        return $this->processingFlag;
    }

    /**
     * @param bool|null $processingFlag
     *
     * @return BatchTransaction
     */
    public function setProcessingFlag($processingFlag)
    {
        $this->processingFlag = $processingFlag;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCompletedCount()
    {
        return $this->completedCount;
    }

    /**
     * @param int|null $completedCount
     *
     * @return BatchTransaction
     */
    public function setCompletedCount($completedCount)
    {
        $this->completedCount = $completedCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getParsingSuccessCount()
    {
        return $this->parsingSuccessCount;
    }

    /**
     * @param int|null $parsingSuccessCount
     *
     * @return BatchTransaction
     */
    public function setParsingSuccessCount($parsingSuccessCount)
    {
        $this->parsingSuccessCount = $parsingSuccessCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRejectionCount()
    {
        return $this->rejectionCount;
    }

    /**
     * @param int|null $rejectionCount
     *
     * @return BatchTransaction
     */
    public function setRejectionCount($rejectionCount)
    {
        $this->rejectionCount = $rejectionCount;
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
     * @return BatchTransaction
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array|null $metadata
     *
     * @return BatchTransaction
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'batchStatus' => $this->batchStatus,
            'transactions' => $this->transactions,
            'batchTitle' => $this->batchTitle,
            'batchDescription' => $this->batchDescription,
            'scheduledStartDate' => $this->scheduledStartDate,
            'requestingOrganisation' => $this->requestingOrganisation,
            'requestDate' => $this->requestDate,
            'customData' => $this->customData
        ]);
    }
}
