<?php

namespace NklKst\TheSportsDb\Request;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class RequestBuilderTest extends TestCase
{
    private RequestBuilder $builder;
    private MockHandler $handlerMock;

    protected function setUp(): void
    {
        $this->handlerMock = new MockHandler();
        $this->builder = new RequestBuilder(new Client(['handler' => HandlerStack::create($this->handlerMock)]));
    }

    public function testSetVersion(): void
    {
        $this->builder->setVersion('testVersion');
        $this->assertSame('testVersion', TestUtils::getHiddenProperty($this->builder, 'version'));
    }

    public function testSetKey(): void
    {
        $this->builder->setKey('testKey');
        $this->assertSame('testKey', TestUtils::getHiddenProperty($this->builder, 'key'));
    }

    public function testSetEndpoint(): void
    {
        $this->builder->setEndpoint('testEndpoint');
        $this->assertSame('testEndpoint', TestUtils::getHiddenProperty($this->builder, 'endpoint'));
    }

    public function testSetQuery(): void
    {
        $this->builder->setQuery('testQuery');
        $this->assertSame('testQuery', TestUtils::getHiddenProperty($this->builder, 'query'));
    }

    public function testBuildUriException(): void
    {
        $method = TestUtils::getHiddenMethod($this->builder, 'buildUri');

        $this->expectExceptionMessage('Endpoint must be defined in RequestBuilder.');
        $method();
    }

    public function testBuildUriSame(): void
    {
        $this->builder->setEndpoint('testEndpoint');
        $method = TestUtils::getHiddenMethod($this->builder, 'buildUri');

        $this->assertSame('https://www.thesportsdb.com/api/v1/json/1/testEndpoint?', $method());
    }

    public function testCheckResponseException(): void
    {
        $method = TestUtils::getHiddenMethod($this->builder, 'checkResponse');
        $response = new Response(404, [], null, null, 'test reason');

        $this->expectExceptionObject(new Exception('HTTP-Error: test reason', 404));
        $method($response);
    }

    public function testCheckResponseSame(): void
    {
        $method = TestUtils::getHiddenMethod($this->builder, 'checkResponse');
        $response = new Response(200);

        $this->assertSame($response, $method($response));
    }

    /**
     * @throws Exception
     */
    public function testRequestException(): void
    {
        $this->builder->setEndpoint('dummy');
        $this->handlerMock->append(new Response(404));

        $this->expectExceptionObject(
            new Exception('Client error: `GET https://www.thesportsdb.com/api/v1/json/1/dummy` resulted in a `404 Not Found` response'));
        $this->builder->request();
    }

    /**
     * @throws Exception
     */
    public function testRequestExceptionPrivateKey(): void
    {
        $this->builder->setEndpoint('dummy')->setKey('privateKey');
        $this->handlerMock->append(new Response(404));

        $this->expectExceptionObject(
            new Exception('Client error: `GET https://www.thesportsdb.com/api/v1/json/HIDDEN_KEY/dummy` resulted in a `404 Not Found` response'));
        $this->builder->request();
    }

    /**
     * @throws Exception
     */
    public function testRequestSameBody(): void
    {
        $this->builder->setEndpoint('dummy');
        $this->handlerMock->append(new Response(200, [], 'testBody'));

        $this->assertSame('testBody', $this->builder->request());
    }
}
