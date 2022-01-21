<?php

use mmpsdk\Common\Common;
use mmpsdk\Common\Models\Balance;
use mmpsdk\Common\Process\AccountBalance;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdkTest\Integration\src\IntegrationTestCase;
use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\RecurringPayment\Process\RetrieveAccountDebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;

class ViewAccountDebitMandateIntegrationTest extends IntegrationTestCase
{
    private static $debitMandateRef;
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return RetrieveAccountDebitMandate::class;
    }

    protected function getResponseInstanceType()
    {
        return DebitMandate::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        $debitMandate = new DebitMandate();
        $debitMandate
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
        $response = RecurringPayment::createAccountDebitMandate(
            self::$accountIdentifier,
            $debitMandate
        )->execute();
        self::$debitMandateRef = Common::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
    }

    protected function setUp(): void
    {
        $this->request = RecurringPayment::viewAccountDebitMandate(
            self::$accountIdentifier,
            self::$debitMandateRef
        );
    }
}
