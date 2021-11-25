<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\InternationalTransfer\Enums\DeliveryMethodType;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;
use mmpsdk\Common\Models\Quotation;
use mmpsdk\Common\Process\TransferQuotation;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class TransferQuotationTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $quotation = new Quotation();
        $quotation
            ->setCreditParty(['accountid' => '2000'])
            ->setDebitParty(['accountid' => '2999'])
            ->setRequestAmount('75.30')
            ->setRequestCurrency('RWF')
            ->setRequestDate('2018-07-03T11:43:27.405Z')
            ->setType(InternationalTransactionType::INTERNATIONAL)
            ->setSubtype('abc')
            ->setChosenDeliveryMethod(DeliveryMethodType::AGENT)
            ->setSendingServiceProviderCountry('AD')
            ->setOriginCountry('AD')
            ->setReceivingCountry('AD')
            ->setCustomData(['keytest' => 'keyvalue']);
        $postalAddress = new Address();
        $postalAddress
            ->setCountry('GB')
            ->setAddressLine1('111 ABC Street')
            ->setCity('New York')
            ->setStateProvince('New York')
            ->setPostalCode('ABCD');
        $subjectName = new Name();
        $subjectName
            ->setTitle('Mr')
            ->setFirstName('Luke')
            ->setMiddleName('R')
            ->setLastName('Skywalker')
            ->setFullName('Luke R Skywalker')
            ->setNativeName('ABC');
        $idDocument = [
            (new IdDocument())
                ->setIdType('nationalidcard')
                ->setIdNumber('1234567')
                ->setIssueDate('2018-07-03T11:43:27.405Z')
                ->setExpiryDate('2021-07-03T11:43:27.405Z')
                ->setIssuer('UKPA')
                ->setIssuerPlace('GB')
                ->setIssuerCountry('GB')
                ->setOtherIdDescription('test')
        ];
        $senderKyc = new KYCInformation();
        $senderKyc
            ->setNationality('GB')
            ->setDateOfBirth('1970-07-03T11:43:27.405Z')
            ->setOccupation('Manager')
            ->setEmployerName('MFX')
            ->setContactPhone('+447125588999')
            ->setGender('m')
            ->setEmailAddress('luke.skywalkeraaabbb@gmail.com')
            ->setBirthCountry('GB')
            ->setIdDocument($idDocument)
            ->setPostalAddress($postalAddress)
            ->setSubjectName($subjectName);
        $quotation->setSenderKyc($senderKyc);
        $this->constructorArgs = [$quotation, 'http://example.com/'];
        $this->requestMethod = 'POST';
        $this->requestUrl = MobileMoney::getBaseUrl() . '/quotations';
        $this->requestParams = [
            '{"creditParty":[{"key":"accountid","value":"2000"}],"debitParty":[{"key":"accountid","value":"2999"}],"requestAmount":"75.30","requestCurrency":"RWF","requestDate":"2018-07-03T11:43:27.405Z","type":"inttransfer","subType":"abc","chosenDeliveryMethod":"agent","senderKyc":{"nationality":"GB","dateOfBirth":"1970-07-03T11:43:27.405Z","occupation":"Manager","employerName":"MFX","contactPhone":"+447125588999","gender":"m","emailAddress":"luke.skywalkeraaabbb@gmail.com","birthCountry":"GB","idDocument":[{"idType":"nationalidcard","idNumber":"1234567","issueDate":"2018-07-03T11:43:27.405Z","expiryDate":"2021-07-03T11:43:27.405Z","issuer":"UKPA","issuerPlace":"GB","issuerCountry":"GB","otherIdDescription":"test"}],"postalAddress":{"country":"GB","addressLine1":"111 ABC Street","city":"New York","stateProvince":"New York","postalCode":"ABCD"},"subjectName":{"title":"Mr","firstName":"Luke","middleName":"R","lastName":"Skywalker","fullName":"Luke R Skywalker","nativeName":"ABC"}},"customData":[{"key":"keytest","value":"keyvalue"}],"sendingServiceProviderCountry":"AD","originCountry":"AD","receivingCountry":"AD"}'
        ];
        $this->className = TransferQuotation::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
