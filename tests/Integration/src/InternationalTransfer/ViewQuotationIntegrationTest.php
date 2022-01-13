<?php

use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Process\ViewQuotation;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdkTest\Integration\src\IntegrationTestCase;
use mmpsdk\Common\Enums\DeliveryMethodType;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;

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
        self::$quotationReference = 'REF-1639039494460';
    }

    protected function setUp(): void
    {
        $this->request = InternationalTransfer::ViewQuotation(
            self::$quotationReference
        );
    }
}
