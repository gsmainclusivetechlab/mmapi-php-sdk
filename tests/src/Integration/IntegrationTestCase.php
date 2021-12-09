<?php

namespace mmpsdkTest\src\Integration;

use mmpsdk\Common\Common;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Process\BaseProcess;
use PHPUnit\Framework\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected $response;
    protected $request;

    abstract protected function getProcessInstanceType();
    abstract protected function getResponseInstanceType();
    abstract protected function getRequestType();

    protected function pollingRequest($serverCorrelationId)
    {
        return Common::viewRequestState($serverCorrelationId);
    }

    public function testProcessInstanceType()
    {
        $this->assertInstanceOf(
            $this->getProcessInstanceType(),
            $this->request
        );
    }

    public function testProcessFeatures()
    {
        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
            $this->assertNotNull($this->request->getClientCorrelationId());
        } else {
            $this->assertNull($this->request->getClientCorrelationId());
        }
    }

    public function testResponse()
    {
        $this->response = $this->request->execute();
        // Test Response is not null
        $this->assertNotNull($this->response);

        //Test Response Code
        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
            $this->assertEquals(
                202,
                $this->request->getRawResponse()->httpCode
            );
        } else {
            $this->assertEquals(
                200,
                $this->request->getRawResponse()->httpCode
            );
        }

        // Test response type
        $this->assertInstanceOf(
            $this->getResponseInstanceType(),
            $this->response
        );

        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
            $this->asynchronusProcessAssertions(NotificationMethod::CALLBACK);
        }
        $this->responseAssertions($this->request, $this->response);
    }

    public function testPollingSequence()
    {
        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
            $this->request->setNotificationMethod(NotificationMethod::POLLING);
            $this->response = $this->request->execute();
            $this->asynchronusProcessAssertions(NotificationMethod::POLLING);

            // Poll Request
            $serverCorreleationId = $this->response->getServerCorrelationId();
            $pollRequest = Common::viewRequestState(
                $serverCorreleationId
            )->execute();
            $this->assertNotNull($pollRequest);
        } else {
            $this->markTestSkipped(
                'This test is only for asynchronous process'
            );
        }
    }

    public function testMissingResponse()
    {
        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
            // Missing Response
            $this->response = $this->request->execute();
            $clientCorreleationId = $this->response->getClientCorrelationId();
            $missingResponse = Common::viewResponse(
                $clientCorreleationId
            )->execute();
            $this->assertNotNull(
                $missingResponse,
                'Missing Response API returned null'
            );
        } else {
            $this->markTestSkipped(
                'This test is only for asynchronous process'
            );
        }
    }

    private function asynchronusProcessAssertions($notificationMethod)
    {
        $this->assertEquals(202, $this->request->getRawResponse()->httpCode);
        $this->assertInstanceOf(
            $this->getResponseInstanceType(),
            $this->response
        );
        $requestStateObject = $this->response;
        $this->assertEquals(
            $notificationMethod,
            $requestStateObject->getNotificationMethod()
        );
        $this->assertNotNull(
            $requestStateObject->getServerCorrelationId(),
            'Server Correlation ID is null'
        );
        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/',
            $requestStateObject->getServerCorrelationId(),
            'Invalid Server Correlation ID Returned in response: ' .
                $requestStateObject->getServerCorrelationId()
        );
        $this->assertMatchesRegularExpression(
            '/^(pending|completed|failed)$/',
            $requestStateObject->getStatus()
        );
    }

    protected function responseAssertions($request, $response)
    {
        $rawResponse = $request->getRawResponse();
        $jsonData = json_decode($rawResponse->result, true);
        $this->validateResponse($response, $jsonData);
        switch ($this->getResponseInstanceType()) {
            case \mmpsdk\Common\Models\AuthorisationCode::class:
                $this->validateFields(
                    ['authorisationCode', 'codeState'],
                    $response,
                    $jsonData
                );
                break;
            case \mmpsdk\Common\Models\Quotation::class:
                $this->validateFields(
                    ['quotationReference', 'requestAmount'],
                    $response,
                    $jsonData
                );
                break;
            case \mmpsdk\Common\Models\Transaction::class:
                $this->validateFields(
                    ['transactionReference', 'transactionStatus'],
                    $response,
                    $jsonData
                ); 
                break;
            default:
                break;
        }
    }

    private function getterMethod($attribute)
    {
        return 'get' .
            str_replace(' ', '', ucwords(str_replace('_', ' ', $attribute)));
    }

    private function validateFields($fields, $response, $jsonData)
    {
        foreach ($fields as $field) {
            $getterMethod = $this->getterMethod($field);
            $this->assertTrue(
                method_exists(get_class($response), $getterMethod),
                'Class ' .
                    get_class($response) .
                    ' does not have method ' .
                    $getterMethod
            );
            $this->assertArrayHasKey(
                $field,
                $jsonData,
                'Field ' . $field . ' not found in response'
            );
            $this->assertNotNull(
                $response->$getterMethod(),
                'Field ' . $field . ' has no value.'
            );
            if (
                !in_array(gettype($response->$getterMethod()), [
                    'object',
                    'array'
                ])
            ) {
                $this->assertEquals(
                    $jsonData[$field],
                    $response->$getterMethod(),
                    'Field ' . $field . ' has invalid value.'
                );
            }
        }
    }

    private function validateResponse($response, $jsonData)
    {
        return $this->validateFields(
            array_keys($jsonData),
            $response,
            $jsonData
        );
    }
}
