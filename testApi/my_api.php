<?php

require_once 'abstract_api.php';
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\MerchantPayment\Process\PayeeInitiated;
use mmpsdk\Common\Exceptions\SDKException;

class MyAPI extends API
{
    public function __construct($request, $origin) {
        parent::__construct($request);

        // Add authentication, model initialization, etc here
    }

    /*
     * Example of an Endpoint
     */
     protected function example() {
        switch ($this->verb) {
            case "get":
                if ($this->method == 'GET') {
                    $transaction = new MerchantTransaction();
                    $transaction->setAmount("200.00")
                        ->setCurrency('RWF')
                        ->setCreditParty([
                            ['key' => 'accountid',
                            'value' => "1"]
                        ])
                        ->setDebitParty([
                            ['key' => 'accountid',
                            'value' => "35"]
                        ]);
                    try {
                        $repsonse = PayeeInitiated::execute($transaction);
                        print_r($repsonse);
                    } catch (SDKException $ex) {
                        print_r($ex->getErrorObj());
                    }
                    return array("status" => "success", "endpoint" => $this->endpoint, "verb" => $this->verb, "args" => $this->args, "request" => $this->request);
                }
                else {
                    return "Only accepts GET requests";
                }
                break;
            case "post":
                if ($this->method == 'POST') {
                    return array("status" => "success", "endpoint" => $this->endpoint, "verb" => $this->verb, "args" => $this->args, "request" => $this->request);
                }
                else {
                    return "Only accepts POST requests";
                }
                break;
            case "delete":
                if ($this->method == 'PUT') {
                    return array("status" => "success", "endpoint" => $this->endpoint, "verb" => $this->verb, "args" => $this->args, "request" => $this->request);
                }
                else {
                    return "Only accepts PUT requests";
                }
                break;
            case "put":
                if ($this->method == 'DELETE') {
                    return array("status" => "success", "endpoint" => $this->endpoint, "verb" => $this->verb, "args" => $this->args, "request" => $this->request);
                }
                else {
                    return "Only accepts DELETE requests";
                }
                break;
            default:
                break;
        }

     }
 }

?>
