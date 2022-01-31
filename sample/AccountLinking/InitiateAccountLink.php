<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\AccountLinking\Models\Link;
use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\AccountLinking\Enums\LinkStatus;
use mmpsdk\AccountLinking\Enums\OperationMode;

$link = new Link();
$link
    ->setSourceAccountIdentifiers(['walletid' => '1'])
    ->setStatus(LinkStatus::ACTIVE)
    ->setMode(OperationMode::BOTH)
    ->setCustomData(['keytest' => 'keyvalue']);
$requestingOrganisation = new RequestingOrganisation();
$requestingOrganisation
    ->setRequestingOrganisationIdentifierType('organisationid')
    ->setRequestingOrganisationIdentifier('12345');
$link->setRequestingOrganisation($requestingOrganisation);

$accountIdentifier = [
    'msisdn' => '+44012345678'
];

try {
    $request = AccountLinking::createAccountLink($accountIdentifier, $link);
    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
