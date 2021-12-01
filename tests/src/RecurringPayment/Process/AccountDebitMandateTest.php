<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\RecurringPayment\Process\AccountDebitMandate;
use mmpsdk\RecurringPayment\Models\DebitMandate;

class AccountDebitMandateTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $debitMandate = new DebitMandate();
        $debitMandate
            ->setPayee([
                'accountid' => '2999'
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
        $accountIdentifiers = [
            'accountid' => 2000
        ];
        $this->constructorArgs = [
            $accountIdentifiers,
            $debitMandate,
            'http://example.com/'
        ];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/debitmandates';
        $this->requestParams = [
            '{"payee":[{"key":"accountid","value":"2999"}],"requestDate":"2018-07-03T10:43:27.405Z","startDate":"2018-07-03T10:43:27.405Z","currency":"GBP","amountLimit":"1000.00","endDate":"2028-07-03T10:43:27.405Z","numberOfPayments":"2","frequencyType":"sixmonths","customData":[{"key":"keytest","value":"keyvalue"}]}'
        ];
        $this->className = AccountDebitMandate::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
