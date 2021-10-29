<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\Balance;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class RetrieveTransaction
 * @package mmpsdk\Common\Process
 */
class RetrieveTransaction extends BaseProcess
{
    /**
     * Account Identifier Attributes
     *
     * @var array
     */
    private $transactionReference;

    private $ObjRef;

    /**
     * Using the Object Reference passed via the /requeststates API,
     * the final representation of the transaction can be returned.
     *
     * @param array $transactionReference
     * @param object $ObjRef
     * @return this
     */
    public function __construct($transactionReference, $ObjRef = null)
    {
        CommonUtil::validateArgument(
            $transactionReference,
            'transactionReference'
        );
        if ($ObjRef) {
            CommonUtil::validateArgument($ObjRef, 'ObjRef', 'object');
        }
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->transactionReference = $transactionReference;
        $this->ObjRef = $ObjRef;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_TRANSACTION)
            ->setUrlParams([
                '{transactionReference}' => $this->transactionReference
            ])
            ->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, $this->ObjRef);
    }
}
