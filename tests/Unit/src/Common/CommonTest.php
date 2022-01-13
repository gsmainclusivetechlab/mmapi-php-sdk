<?php

use mmpsdk\Common\Common;
use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Models\Transaction;
use mmpsdkTest\Unit\src\Common\Process\WrapperTestCase;

class CommonTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = Common::class;

        $accountBalance = Common::viewAccountBalance(['accountid' => 2000]);
        $this->checkStaticFunctionParamCount(
            'viewAccountBalance',
            mmpsdk\Common\Process\AccountBalance::class
        );
        $this->checkFunctionReturnInstance(
            $accountBalance,
            mmpsdk\Common\Process\AccountBalance::class
        );

        $requestState = Common::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $accountTransactions = Common::viewAccountTransactions([
            'accountid' => 2000
        ]);
        $this->checkStaticFunctionParamCount(
            'viewAccountTransactions',
            mmpsdk\Common\Process\RetrieveAccountTransactions::class
        );
        $this->checkFunctionReturnInstance(
            $accountTransactions,
            mmpsdk\Common\Process\RetrieveAccountTransactions::class
        );

        $response = Common::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = Common::viewServiceAvailability('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $retrieveTransaction = Common::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = Common::createReversal('ABC123');
        $this->checkStaticFunctionParamCount(
            'createReversal',
            mmpsdk\Common\Process\TransactionReversal::class
        );
        $this->checkFunctionReturnInstance(
            $reversalTransaction,
            mmpsdk\Common\Process\TransactionReversal::class
        );
    }
}
