<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\InternationalTransfer\Models\Quotation;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class InternationalTransferTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = InternationalTransfer::class;

        $internationalTransaction = InternationalTransfer::createInternationalTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createInternationalTransaction',
            mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $internationalTransaction,
            mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction::class
        );

        $createdQuotation = InternationalTransfer::createQuotation(
            new Quotation()
        );
        $this->checkStaticFunctionParamCount(
            'createQuotation',
            mmpsdk\InternationalTransfer\Process\TransferQuotation::class
        );
        $this->checkFunctionReturnInstance(
            $createdQuotation,
            mmpsdk\InternationalTransfer\Process\TransferQuotation::class
        );

        $quotation = InternationalTransfer::viewQuotation('REF123');
        $this->checkStaticFunctionParamCount(
            'viewQuotation',
            mmpsdk\InternationalTransfer\Process\ViewQuotation::class
        );
        $this->checkFunctionReturnInstance(
            $quotation,
            mmpsdk\InternationalTransfer\Process\ViewQuotation::class
        );
    }
}
