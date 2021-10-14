<?php

namespace mmpsdk\Common\Utils;

use Exception;
use stdClass;

/**
 * Class Validator
 * @package mmpsdk\Common\Utils
 */
class Validator
{
    protected $objToValidate;
    private $validationErrors = array();
    private $defaultErrorMsg;

    public const
        MANDATORY = 1,
        VALID_AMOUNT = 2,
        POSITIVE_NUMBER = 3;

    public function __construct($obj)
    {
        $this->objToValidate = $obj;
        $this->defaultErrorMsg = array(
            self::MANDATORY => "This field is mandatory",
            self::VALID_AMOUNT => "Wrong amount value.",
            self::POSITIVE_NUMBER => "Positive number is required",
        );
        return $this->validate();
    }

    /**
     * Validate single field value with one of the predefined validators.
     *
     * @param $fieldName string
     * @param $type int One of the Constants for predefined validator
     * @param $message string Error message to be displayed or NULL for default message
     * @param $params array Additional params for validators that requre them, e.g.
     * min and max values for a range validator, etc.
     * @return void
    */
    public function validateField($fieldName, $type, $message = null, $params = null)
    {
        $method = 'get'.str_replace(' ', '', ucwords(str_replace('_', ' ', $fieldName)));
        if (is_callable(array($this->objToValidate, $method))) {
            $value = $this->objToValidate->$method();
            //Validation Rules
            switch ($type) {
                    case self::MANDATORY:
                        if (empty($value)) {
                            $this->addError($fieldName, $this->defaultErrorMsg[self::MANDATORY]);
                        }
                        break;
                    case self::VALID_AMOUNT:
                        $pattern = '/^([0]|([1-9][0-9]{0,17}))([.][0-9]{0,3}[0-9])?$/m';
                        if (!preg_match($pattern, $value) && !(empty($value))) {
                            $this->addError($fieldName, $this->defaultErrorMsg[self::VALID_AMOUNT]);
                        }
                        break;
                    default:
                        throw new Exception("Validator: " + $type + " is not a valid type.");
                }
        } else {
            throw new Exception("Validator: " + $fieldName + " is not a valid field.");
        }
    }

    public function validate()
    {
    }

    /**
     * Add error to this object (to $this->validationErrors).
     *
     * @param $fieldName string
     * @param $message string Error message to be displayed
    */
    public function addError($fieldName, $message)
    {
        $this->validationErrors = array_merge($this->validationErrors, [$fieldName => $message]);
    }

    /**
     * Get validation errors for all fields that didn't pass validation.
     * The result is an
     *
     * @return array|NULL array where keys are field names and values are validation messages.
    */
    public function getValidationErrors()
    {
        if (empty($this->validationErrors)) {
            return null;
        } else {
            $formattedArray = array();
            foreach ($this->validationErrors as $validationErrorKey => $validationErrorValue) {
                $errorParamObj = new stdClass();
                $errorParamObj->key = $validationErrorKey;
                $errorParamObj->value = $validationErrorValue;
                array_push($formattedArray, $errorParamObj);
            }
            return $formattedArray;
        }
    }
}
