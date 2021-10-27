<?php

namespace mmpsdk\MerchantPayment\Validation;

use mmpsdk\Common\Utils\Validator;

/**
 * Class ReversalValidator
 * @package mmpsdk\MerchantPayment\Validation
 */
class ReversalValidator extends Validator
{
    public function validate()
    {
        $this->validateField('type', self::MANDATORY);
        $this->validateField('amount', self::VALID_AMOUNT);

        if ($errors = $this->getValidationErrors()) {
            $this->throwValidationError($errors);
        }
    }
}
