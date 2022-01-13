<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Process\ViewQuotation;
use mmpsdkTest\Unit\src\Common\Process\ProcessTestCase;

class ViewQuotationTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $quotationReference = 'ABC123';
        $this->constructorArgs = [$quotationReference];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/quotations/' . $quotationReference;
        $this->className = ViewQuotation::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'Quotation.json';
        $this->responseType = Quotation::class;
    }
}
