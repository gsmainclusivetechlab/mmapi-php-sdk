<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\AccountLinking\Models\AccountLink;
use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\AccountLinking\Enums\LinkStatus;
use mmpsdk\AccountLinking\Enums\OperationMode;

$accountLink = new AccountLink();
$accountLink
    ->setSourceAccountIdentifiers(['accountid' => '2999'])
    ->setStatus(LinkStatus::ACTIVE)
    ->setMode(OperationMode::BOTH)
    ->setCustomData(['keytest' => 'keyvalue']);
$requestingOrganisation = new RequestingOrganisation();
$requestingOrganisation
    ->setRequestingOrganisationIdentifierType('organisationid')
    ->setRequestingOrganisationIdentifier('12345');
$accountLink->setRequestingOrganisation($requestingOrganisation);

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $request = AccountLinking::createAccountLink(
        $accountIdentifier,
        $accountLink
    );
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
