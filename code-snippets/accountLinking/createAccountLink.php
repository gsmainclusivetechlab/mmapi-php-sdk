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
    ->setSourceAccountIdentifiers(['accountid' => '2999'])
    ->setStatus(LinkStatus::ACTIVE)
    ->setMode(OperationMode::BOTH)
    ->setCustomData(['keytest' => 'keyvalue']);
$requestingOrganisation = new RequestingOrganisation();
$requestingOrganisation
    ->setRequestingOrganisationIdentifierType('organisationid')
    ->setRequestingOrganisationIdentifier('12345');
$link->setRequestingOrganisation($requestingOrganisation);

$accountIdentifier = [
    'accountid' => 2000
];

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AccountLinking::createAccountLink($accountIdentifier, $link);

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    print_r($clientCorrelationId);

    /**
     *Execute the request
     */
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}