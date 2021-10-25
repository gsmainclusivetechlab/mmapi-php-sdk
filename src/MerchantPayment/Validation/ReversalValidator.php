<?php

namespace mmpsdk\MerchantPayment\Validation;

use mmpsdk\Common\Utils\Validator;
use Exception;
use mmpsdk\Common\Exceptions\SDKException;

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
            throw new SDKException(
                'Validation Error',
                SDKException::getnerateErrorObj(
                    'validation',
                    'formatError',
                    'Invalid JSON Field',
                    $errors
                )
            );
        }

        // custom validator
        // if ($merchantTransaction->amount <= 0) {
        // 	$this->addError('amount', "Amount cannot be zero");
        // }
    }
}
