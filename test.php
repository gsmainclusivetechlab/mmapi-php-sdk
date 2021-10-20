<?php
use mmpsdk\MerchantPayment\Process\PayeeInitiated;
use mmpsdk\Common\Process\AccessToken;
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Cache\AuthorizationCache;
use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Process\ServiceAvailability;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdk\MerchantPayment\Process\AuthorisedPaymentCode;
use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;
use mmpsdk\MerchantPayment\Process\ViewAuthorisationCode;
use mmpsdk\Common\Process\RetrieveMissingResponse;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\MerchantPayment\Process\InitiatePayment;

require __DIR__ . '/vendor/autoload.php';

MobileMoney::initialize(
    MobileMoney::SANDBOX,
    '59vthmq3f6i15v6jmcjskfkmh',
    'ef8tl4gihlpfd7r8jpc1t1nda33q5kcnn32cj375lq6mg2nv7rb',
    'oVN89kXyTx1cKT3ZohH7h6foEmQmjqQm3OK2U8Ue'
);
MobileMoney::setCallbackUrl(
    'https://1527dea3-111f-48de-ba27-1c840df261c1.mock.pstmn.io/callback'
);
MobileMoney::setSecurityLevel(SecurityLevel::STANDARD);



// $response1 = AccessToken::execute();
// $accessToken = $response1->access_token;
// print_r($response1);

$authCodeObj = new AuthorisationCode();
$authCodeObj
    ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
    ->setCurrency('GBP')
    ->setAmount('1001.00');
$accountIdentifier = [
    'organisationid' => 1234,
    'accountid' => 2000,
    'bankaccountno' => 12345
];

// $accountIdentifier = [
//     'accountid' => 2000
// ];

// try {
//     // $repsonse = CreateAuthorisationCode::execute($accountIdentifier, $authCodeObj);

//     // $repsonse = ViewAuthorisationCode::execute($accountIdentifier);
//     // $repsonse = ServiceAvailability::execute();
//     $repsonse = RetrieveMissingResponse::execute(
//         '5c075ae1-f518-4310-b534-6f14f153214b',
//         new AuthorisationCode()
//     );
//     print_r($repsonse);
// } catch (SDKException $ex) {
//     print_r($ex);
// }

$transaction = new MerchantTransaction();
$transaction
    ->setAmount('200.00')
    ->setCurrency('RWF')
    ->setCreditParty(['accountid' => '2999', 'sdasd' => 'asd'])
    ->setDebitParty(['accountid' => '2999']);

try {
    $request = InitiatePayment::build($transaction);
    print_r($request->getClientCorrelationId());
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}

// var_dump(json_decode($response1));
