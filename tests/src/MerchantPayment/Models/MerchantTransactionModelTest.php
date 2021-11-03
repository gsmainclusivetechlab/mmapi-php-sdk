<?php

use mmpsdk\Common\Models\Fee;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\Common\Models\Transaction;
use PHPUnit\Framework\TestCase;

class MerchantTransactionModelTest extends TestCase
{
    private $jsonData = '{"requestingOrganisationTransactionReference":"string","originalTransactionReference":"string","subType":"string","amount":"15.23","currency":"RWF","descriptionText":"string","fees":[{"feeType":"string","feeAmount":"5.46","feeCurrency":"AED"}, {"feeType":"string","feeCurrency":"AED"}],"geoCode":"37.423825,-122.082900","oneTimeCode":"string","requestingOrganisation":{"requestingOrganisationIdentifierType":"lei","requestingOrganisationIdentifier":"string"},"servicingIdentity":"string","requestDate":"2021-10-28T06:45:33.885Z","customData":[{"key":"string","value":"string"}],"metadata":[{"key":"string","value":"string"}]}';

    public function testCheckObjectHydration()
    {
        $merchantTransaction = new Transaction();
        $hydratedObj = $merchantTransaction->hydrate(
            json_decode($this->jsonData)
        );

        $this->assertIsArray(
            $hydratedObj->getFees(),
            'Should return array of Fee Objects'
        );
        $this->assertContainsOnlyInstancesOf(
            Fee::class,
            $hydratedObj->getFees(),
            'Should be array of Fee Objects'
        );
        $this->assertInstanceOf(
            RequestingOrganisation::class,
            $hydratedObj->getRequestingOrganisation(),
            'Should be of type RequestingOrganisation'
        );
    }
}
