<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdk\Common\Models\PatchData;
use mmpsdk\AgentService\Models\Account;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class AgentServiceTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = AgentService::class;

        $depositTransaction = AgentService::createDepositTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createDepositTransaction',
            mmpsdk\AgentService\Process\InitiateDepositTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $depositTransaction,
            mmpsdk\AgentService\Process\InitiateDepositTransaction::class
        );

        $withdrawalTransaction = AgentService::createWithdrawalTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createWithdrawalTransaction',
            mmpsdk\AgentService\Process\InitiateWithdrawalTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $withdrawalTransaction,
            mmpsdk\AgentService\Process\InitiateWithdrawalTransaction::class
        );

        $createAccount = AgentService::createAccount(new Account());
        $this->checkStaticFunctionParamCount(
            'createAccount',
            mmpsdk\AgentService\Process\InitiateAccount::class
        );
        $this->checkFunctionReturnInstance(
            $createAccount,
            mmpsdk\AgentService\Process\InitiateAccount::class
        );

        $retrieveAccount = AgentService::viewAccount(['accountid' => 2000]);
        $this->checkStaticFunctionParamCount(
            'viewAccount',
            mmpsdk\AgentService\Process\RetrieveAccount::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveAccount,
            mmpsdk\AgentService\Process\RetrieveAccount::class
        );

        $accountUpdate = AgentService::updateAccountIdentity(
            ['accountid' => 2000],
            '105',
            [new PatchData()]
        );
        $this->checkStaticFunctionParamCount(
            'updateAccountIdentity',
            mmpsdk\AgentService\Process\updateAccountIdentity::class
        );
        $this->checkFunctionReturnInstance(
            $accountUpdate,
            mmpsdk\AgentService\Process\updateAccountIdentity::class
        );

        $authorisationCode = AgentService::createAuthorisationCode(
            ['accountid' => 2000],
            new AuthorisationCode()
        );
        $this->checkStaticFunctionParamCount(
            'createAuthorisationCode',
            mmpsdk\Common\Process\CreateAuthorisationCode::class
        );
        $this->checkFunctionReturnInstance(
            $authorisationCode,
            mmpsdk\Common\Process\CreateAuthorisationCode::class
        );

        $authorisationCodeObj = AgentService::viewAuthorisationCode(
            ['accountId' => '1234'],
            'REF123'
        );
        $this->checkStaticFunctionParamCount(
            'viewAuthorisationCode',
            mmpsdk\Common\Process\ViewAuthorisationCode::class
        );
        $this->checkFunctionReturnInstance(
            $authorisationCodeObj,
            mmpsdk\Common\Process\ViewAuthorisationCode::class
        );

        $requestState = AgentService::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = AgentService::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = AgentService::viewServiceAvailability('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $accountBalance = AgentService::viewAccountBalance([
            'accountid' => 2000
        ]);
        $this->checkStaticFunctionParamCount(
            'viewAccountBalance',
            mmpsdk\Common\Process\AccountBalance::class
        );
        $this->checkFunctionReturnInstance(
            $accountBalance,
            mmpsdk\Common\Process\AccountBalance::class
        );

        $accountTransactions = AgentService::viewAccountTransactions([
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

        $retrieveTransaction = AgentService::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = AgentService::createReversal('ABC123');
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
