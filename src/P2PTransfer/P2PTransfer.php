<?php

namespace mmpsdk\P2PTransfer;

use mmpsdk\Common\Traits\CommonTrait;
use mmpsdk\Common\Traits\CommonAccountTrait;
use mmpsdk\Common\Traits\QuotationTrait;
use mmpsdk\Common\Traits\AccountNameTrait;
use mmpsdk\Common\Traits\TransferTransactionTrait;

/**
 * Class P2PTransfer
 * @package mmpsdk\P2PTransfer
 */
class P2PTransfer
{
    use CommonTrait;
    use CommonAccountTrait;
    use QuotationTrait;
    use AccountNameTrait;
    use TransferTransactionTrait;
}
