<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Disbursement;
use mmpsdkTest\Integration\src\IntegrationTestCase;
use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\Disbursement\Process\InitiateBulkDisbursement;
use mmpsdk\RecurringPayment\Process\AccountDebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;

class CreateAccountDebitMandateIntegrationTest extends IntegrationTestCase
{
    private static $debitMandate;
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return AccountDebitMandate::class;
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
        self::$debitMandate = new DebitMandate();
        self::$debitMandate
            ->setPayee([
                'walletid' => '1'
            ])
            ->setCurrency('GBP')
            ->setAmountLimit('1000.00')
            ->setRequestDate('2018-07-03T10:43:27.405Z')
            ->setStartDate('2018-07-03T10:43:27.405Z')
            ->setEndDate('2028-07-03T10:43:27.405Z')
            ->setNumberOfPayments('2')
            ->setFrequencyType('sixmonths')
            ->setCustomData([
                'keytest' => 'keyvalue'
            ]);
        self::$accountIdentifier = [
            'msisdn' => '+44012345678'
        ];
    }

    protected function setUp(): void
    {
        $this->request = RecurringPayment::createAccountDebitMandate(
            self::$accountIdentifier,
            self::$debitMandate
        );
    }
}
