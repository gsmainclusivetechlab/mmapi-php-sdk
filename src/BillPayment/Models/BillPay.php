<?php

namespace mmpsdk\BillPayment\Models;

use mmpsdk\Common\Models\BaseModel;

/**
 * Class BillPay
 * @package mmpsdk\BillPayment\Models
 */
class BillPay extends BaseModel
{
    /**
     * @var string
     */
    private $serviceProviderPaymentReference;

    /**
     * @var string
     */
    private $requestingOrganisationTransactionReference;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var string
     */
    private $billPaymentStatus;

    /**
     * @var string
     */
    private $amountPaid;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $customerReference;

    /**
     * @var string
     */
    private $requestingOrganisation;

    /**
     * @var array
     */
    private $supplementaryBillReferenceDetails;

    /**
     * @var string
     */
    private $serviceProviderComment;

    /**
     * @var string
     */
    private $serviceProviderNotification;

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
     * @var string
     */
    private $customData;

    /**
     * @var array
     */
    private $metadata;

    /**
     * @return string|null
     */
    public function getServiceProviderPaymentReference()
    {
        return $this->serviceProviderPaymentReference;
    }

    /**
     * @param string|null $serviceProviderPaymentReference
     *
     * @return BillPay
     */
    public function setServiceProviderPaymentReference(
        $serviceProviderPaymentReference
    ) {
        $this->serviceProviderPaymentReference = $serviceProviderPaymentReference;

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
     * @return BillPay
     */
    public function setRequestingOrganisationTransactionReference(
        $requestingOrganisationTransactionReference
    ) {
        $this->requestingOrganisationTransactionReference = $requestingOrganisationTransactionReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param string|null $paymentType
     *
     * @return BillPay
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBillPaymentStatus()
    {
        return $this->billPaymentStatus;
    }

    /**
     * @param string|null $billPaymentStatus
     *
     * @return BillPay
     */
    public function setBillPaymentStatus($billPaymentStatus)
    {
        $this->billPaymentStatus = $billPaymentStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAmountPaid()
    {
        return $this->amountPaid;
    }

    /**
     * @param string|null $amountPaid
     *
     * @return BillPay
     */
    public function setAmountPaid($amountPaid)
    {
        $this->amountPaid = $amountPaid;

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
     * @return BillPay
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * @param string|null $customerReference
     *
     * @return BillPay
     */
    public function setCustomerReference($customerReference)
    {
        $this->customerReference = $customerReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestingOrganisation()
    {
        return $this->requestingOrganisation;
    }

    /**
     * @param string|null $requestingOrganisation
     *
     * @return BillPay
     */
    public function setRequestingOrganisation($requestingOrganisation)
    {
        $this->requestingOrganisation = $requestingOrganisation;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getSupplementaryBillReferenceDetails()
    {
        return $this->supplementaryBillReferenceDetails;
    }

    /**
     * @param array|null $supplementaryBillReferenceDetails
     *
     * @return BillPay
     */
    public function setSupplementaryBillReferenceDetails(
        $supplementaryBillReferenceDetails
    ) {
        $this->supplementaryBillReferenceDetails = $supplementaryBillReferenceDetails;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServiceProviderComment()
    {
        return $this->serviceProviderComment;
    }

    /**
     * @param string|null $serviceProviderComment
     *
     * @return BillPay
     */
    public function setServiceProviderComment($serviceProviderComment)
    {
        $this->serviceProviderComment = $serviceProviderComment;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServiceProviderNotification()
    {
        return $this->serviceProviderNotification;
    }

    /**
     * @param string|null $serviceProviderNotification
     *
     * @return BillPay
     */
    public function setServiceProviderNotification($serviceProviderNotification)
    {
        $this->serviceProviderNotification = $serviceProviderNotification;

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
     * @return BillPay
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
     * @return BillPay
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
     * @return BillPay
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

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
     * @return BillPay
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

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
     * @return BillPay
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'serviceProviderPaymentReference' =>
                $this->serviceProviderPaymentReference,
            'requestingOrganisationTransactionReference' =>
                $this->requestingOrganisationTransactionReference,
            'paymentType' => $this->paymentType,
            'amountPaid' => $this->amountPaid,
            'currency' => $this->currency,
            'customerReference' => $this->customerReference,
            'requestingOrganisation' => $this->requestingOrganisation,
            'supplementaryBillReferenceDetails' =>
                $this->supplementaryBillReferenceDetails,
            'requestDate' => $this->requestDate,
            'customData' => $this->customData,
            'metadata' => $this->metadata
        ]);
    }

    public function hydratorStrategies()
    {
        $this->addHydratorStrategy(
            'supplementaryBillReferenceDetails',
            new \mmpsdk\BillPayment\Models\BillReference()
        );
    }
}
