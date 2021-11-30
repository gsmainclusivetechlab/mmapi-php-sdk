<?php

namespace mmpsdk\RecurringPayment\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\RecurringPayment\Models\BatchTransaction;
use mmpsdk\RecurringPayment\Models\DebitMandate;

/**
 * Class RetrieveAccountDebitMandate
 * @package mmpsdk\RecurringPayment\Process
 */
class RetrieveAccountDebitMandate extends BaseProcess
{
    /**
     * Batch id
     *
     * @var string
     */
    private $mandateReference;

    /**
     * Account Identifiers
     *
     * @var array
     */
    private $accountIdentifier;

    /**
     * Gets the current status of a batch transaction
     *
     * @param array $accountIdentifier
     * @param string $mandateReference
     * @return this
     */
    public function __construct($accountIdentifier, $mandateReference)
    {
        CommonUtil::validateArgument(
            $mandateReference,
            'mandateReference',
            CommonUtil::TYPE_STRING
        );
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->mandateReference = $mandateReference;
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        return $this;
    }

    /**
     *
     * @return DebitMandate
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_ACCOUNT_DEBIT_MANDATE)
            ->setUrlParams([
                '{debitMandateReference}' => $this->mandateReference,
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new DebitMandate());
    }
}
