<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;

/**
 * Class ViewQuotation
 * @package mmpsdk\Common\Process
 */
class ViewQuotation extends BaseProcess
{
    private $quotationReference;

    /**
     * Returns a specific quotation
     *
     * @param string $quotationReference
     * @return this
     */
    public function __construct($quotationReference)
    {
        CommonUtil::validateArgument(
            $quotationReference,
            'quotationReference',
            CommonUtil::TYPE_STRING
        );
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->quotationReference = $quotationReference;
        return $this;
    }

    /**
     * @return Quotation
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_QUOTATION)
            ->setUrlParams([
                '{quotationReference}' => $this->quotationReference
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new Quotation());
    }
}
