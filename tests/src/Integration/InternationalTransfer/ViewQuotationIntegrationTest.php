<?php

use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Process\ViewQuotation;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewQuotationIntegrationTest extends IntegrationTestCase
{
    private static $quotationReference;

    protected function getProcessInstanceType()
    {
        return ViewQuotation::class;
    }

    protected function getResponseInstanceType()
    {
        return Quotation::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$quotationReference = 'REF-1637057900018';
    }

    protected function setUp(): void
    {
        $this->request = InternationalTransfer::ViewQuotation(
            self::$quotationReference
        );
    }
}
