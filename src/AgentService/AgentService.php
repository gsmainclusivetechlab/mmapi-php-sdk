<?php

namespace mmpsdk\AgentService;

use mmpsdk\Common\Traits\CommonTrait;
use mmpsdk\Common\Traits\CommonAccountTrait;
use mmpsdk\Common\Traits\QuotationTrait;
use mmpsdk\Common\Traits\AccountNameTrait;

/**
 * Class AgentService
 * @package mmpsdk\AgentService
 */
class AgentService
{
    use CommonTrait;
    use CommonAccountTrait;
    use QuotationTrait;
    use AccountNameTrait;

    /**
     * Initiates a Deposit Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiateDepositTransaction
     */
    public static function createDepositTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\AgentService\Process\InitiateDepositTransaction(
            $transaction,
            $callBackUrl
        );
    }

    /**
     * Initiates a Withdrawal Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiateWithdrawalTransaction
     */
    public static function createWithdrawalTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\AgentService\Process\InitiateWithdrawalTransaction(
            $transaction,
            $callBackUrl
        );
    }

    /**
     * Initiates a Account Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param String $identityType
     * @param Account $account
     * @param string $callBackUrl
     * @return InitiateAccount
     */
    public static function createAccount(
        $identityType,
        \mmpsdk\AgentService\Models\Account $account,
        $callBackUrl = null
    ) {
        return new \mmpsdk\AgentService\Process\InitiateAccount(
            $identityType,
            $account,
            $callBackUrl
        );
    }

    /**
     * Retrieve account object of a given account
     *
     * @param array $accountIdentifier
     * @return RetrieveAccount
     */
    public static function viewAccount($accountIdentifier)
    {
        return new \mmpsdk\AgentService\Process\RetrieveAccount(
            $accountIdentifier
        );
    }

    /**
     * Updates an account identity.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param string $identityId
     * @param array $patchData
     * @param string $callBackUrl
     * @return UpdateAccountIdentity
     */
    public static function UpdateAccountIdentity(
        $accountIdentifier,
        $identityId,
        $patchData,
        $callBackUrl = null
    ) {
        return new \mmpsdk\AgentService\Process\UpdateAccountIdentity(
            $accountIdentifier,
            $identityId,
            $patchData,
            $callBackUrl
        );
    }
}
