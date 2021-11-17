<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Models\Quotation;
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
    }
}
