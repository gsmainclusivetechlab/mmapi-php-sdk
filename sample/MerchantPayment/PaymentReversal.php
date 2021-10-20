<?php
use mmpsdk\MerchantPayment\Models\Reversal;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\PaymentReversal;

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

$reversalObj = new Reversal();

try {
    $request = PaymentReversal::build('7068', $reversalObj);
    print_r($request->getClientCorrelationId());
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
