<?php

namespace mmpsdk\MerchantPayment\Validation;

use mmpsdk\Common\Utils\Validator;

/**
 * Class AuthorisationCodeValidator
 * @package mmpsdk\MerchantPayment\Validation
 */
class AuthorisationCodeValidator extends Validator
{
    public function validate()
    {
        $this->validateField('amount', self::VALID_AMOUNT);

        if ($errors = $this->getValidationErrors()) {
            $this->throwValidationError($errors);
        }
    }
}
