<?php

use mmpsdk\BillPayment\Models\Bill;
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\BillPayment\BillPayment;
use mmpsdkTest\Unit\src\Common\Process\WrapperTestCase;

class BillPaymentTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = BillPayment::class;

        $requestState = BillPayment::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = BillPayment::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = BillPayment::viewServiceAvailability('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $billTransaction = BillPayment::createBillTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createBillTransaction',
            mmpsdk\BillPayment\Process\InitiateBillTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $billTransaction,
            mmpsdk\BillPayment\Process\InitiateBillTransaction::class
        );

        $createBillPayment = BillPayment::createBillPayment(
            ['accountid' => 2000],
            'REF-000001',
            new BillPay()
        );
        $this->checkStaticFunctionParamCount(
            'createBillPayment',
            mmpsdk\BillPayment\Process\InitiateBillPayment::class
        );
        $this->checkFunctionReturnInstance(
            $createBillPayment,
            mmpsdk\BillPayment\Process\InitiateBillPayment::class
        );

        $billPayment = BillPayment::viewBillPayment(
            ['accountid' => 2000],
            'REF-000001'
        );
        $this->checkStaticFunctionParamCount(
            'viewBillPayment',
            mmpsdk\BillPayment\Process\RetrieveBillPayment::class
        );
        $this->checkFunctionReturnInstance(
            $billPayment,
            mmpsdk\BillPayment\Process\RetrieveBillPayment::class
        );

        $accountBills = BillPayment::viewAccountBills([
            'accountid' => 2000
        ]);
        $this->checkStaticFunctionParamCount(
            'viewAccountBills',
            mmpsdk\BillPayment\Process\RetrieveAccountBills::class
        );
        $this->checkFunctionReturnInstance(
            $accountBills,
            mmpsdk\BillPayment\Process\RetrieveAccountBills::class
        );

        $retrieveTransaction = BillPayment::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
    }
}
