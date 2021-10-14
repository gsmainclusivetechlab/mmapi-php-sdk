<?php

namespace mmpsdk\MerchantPayment\Validation;

use mmpsdk\Common\Utils\Validator;
use Exception;
use mmpsdk\Common\Exceptions\SDKException;

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
            throw new SDKException("Validation Error", SDKException::getnerateErrorObj('validation', 'formatError', 'Invalid JSON Field', $errors));
        }
    }
}
