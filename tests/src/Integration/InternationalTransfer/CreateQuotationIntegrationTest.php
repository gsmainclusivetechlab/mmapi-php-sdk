<?php

use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Process\TransferQuotation;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdkTest\src\Integration\IntegrationTestCase;
use mmpsdk\Common\Enums\DeliveryMethodType;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;

class CreateQuotationIntegrationTest extends IntegrationTestCase
{
    private static $quotation;

    protected function getProcessInstanceType()
    {
        return TransferQuotation::class;
    }

    protected function getResponseInstanceType()
    {
        return RequestState::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::ASYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$quotation = new Quotation();
        self::$quotation
            ->setCreditParty(['walletid' => '1'])
            ->setDebitParty(['msisdn' => '+44012345678'])
            ->setRequestAmount('77.30')
            ->setRequestCurrency('RWF')
            ->setRequestDate('2018-07-03T11:43:27.405Z')
            ->setType(InternationalTransactionType::INTERNATIONAL)
            ->setSubtype('abc')
            ->setChosenDeliveryMethod(DeliveryMethodType::AGENT);
    }

    protected function setUp(): void
    {
        $this->request = InternationalTransfer::createQuotation(
            self::$quotation
        );
    }
}
