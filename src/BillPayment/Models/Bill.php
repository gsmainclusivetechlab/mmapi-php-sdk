<?php

namespace mmpsdk\BillPayment\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class Bill
 * @package mmpsdk\BillPayment\Models
 */
class Bill extends BaseModel
{
    /**
     * @var string
     */
    private $billReference;

    /**
     * @var string
     */
    private $billStatus;

    /**
     * @var string
     */
    private $amountDue;

    /**
     * @var string
     */
    private $billDescription;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $dueDate;

    /**
     * @var string
     */
    private $minimumAmountDue;

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
    private $customData;

    /**
     * @var string
     */
    private $metadata;

    /**
     * @return string|null
     */
    public function getBillReference()
    {
        return $this->billReference;
    }

    /**
     * @param string|null $billReference
     *
     * @return Bill
     */
    public function setBillReference($billReference)
    {
        $this->billReference = $billReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBillStatus()
    {
        return $this->billStatus;
    }

    /**
     * @param string|null $billStatus
     *
     * @return Bill
     */
    public function setBillStatus($billStatus)
    {
        $this->billStatus = $billStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAmountDue()
    {
        return $this->amountDue;
    }

    /**
     * @param string|null $amountDue
     *
     * @return Bill
     */
    public function setAmountDue($amountDue)
    {
        $this->amountDue = $amountDue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBillDescription()
    {
        return $this->billDescription;
    }

    /**
     * @param string|null $billDescription
     *
     * @return Bill
     */
    public function setBillDescription($billDescription)
    {
        $this->billDescription = $billDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     *
     * @return Bill
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param string|null $dueDate
     *
     * @return Bill
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMinimumAmountDue()
    {
        return $this->minimumAmountDue;
    }

    /**
     * @param string|null $minimumAmountDue
     *
     * @return Bill
     */
    public function setMinimumAmountDue($minimumAmountDue)
    {
        $this->minimumAmountDue = $minimumAmountDue;

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
     * @return Bill
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
     * @return Bill
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

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
     * @return Bill
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string|null $metadata
     *
     * @return Bill
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'customData' => $this->customData
        ]);
    }
}
