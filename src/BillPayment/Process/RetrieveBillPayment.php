<?php

namespace mmpsdk\BillPayment\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\BillPayment\Models\BillPay;

/**
 * Class RetrieveBillPayment
 * @package mmpsdk\BillPayment\Process
 */
class RetrieveBillPayment extends BaseProcess
{
    /**
     * Account Identifier Attributes
     *
     * @var array
     */
    private $accountIdentifier;

    private $billReference;

    private $filter;

    /**
     * Returns a set of transactions for a given account.
     *
     * @param array $accountIdentifier
     * @param string $billReference
     * @param array $filter
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        $billReference,
        $filter = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );
        CommonUtil::validateArgument(
            $billReference,
            'billReference',
            CommonUtil::TYPE_STRING
        );
        if ($filter) {
            CommonUtil::validateArgument(
                $filter,
                'filter',
                CommonUtil::TYPE_ARRAY
            );
        }
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->billReference = $billReference;
        $this->filter = $filter;
        return $this;
    }

    /**
     *
     * @return array
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_BILL_PAYMENT, $this->filter)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                ),
                '{billReference}' => $this->billReference
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new BillPay());
    }
}
