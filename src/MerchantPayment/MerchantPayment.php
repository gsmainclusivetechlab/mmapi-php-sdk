<?php

namespace mmpsdk\MerchantPayment;

use mmpsdk\Common\Traits\CommonTrait;
use mmpsdk\Common\Traits\CommonAccountTrait;
use mmpsdk\Common\Traits\AuthorizationCodeTrait;
use mmpsdk\Common\Traits\MerchantTransactionTrait;

/**
 * Class MerchantPayment
 * @package mmpsdk\MerchantPayment
 */
class MerchantPayment
{
    use CommonTrait;
    use CommonAccountTrait;
    use AuthorizationCodeTrait;
    use MerchantTransactionTrait;
}
