<?php

namespace mmpsdk\MerchantPayment\Validation;

use mmpsdk\Common\Utils\Validator;

/**
 * Class TransactionValidator
 * @package mmpsdk\MerchantPayment\Validation
 */
class TransactionValidator extends Validator
{
    public function validate()
    {
        $this->validateField('amount', self::MANDATORY);
        $this->validateField('amount', self::VALID_AMOUNT);
        $this->validateField('type', self::MANDATORY);
        $this->validateField('currency', self::MANDATORY);

        if ($errors = $this->getValidationErrors()) {
            $this->throwValidationError($errors);
        }

        // custom validator
        // if ($merchantTransaction->amount <= 0) {
        // 	$this->addError('amount', "Amount cannot be zero");
        // }
    }
}
