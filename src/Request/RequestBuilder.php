<?php

namespace NklKst\TheSportsDb\Request;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class RequestBuilder
{
    private ClientInterface $http;

    private string $baseUrl = 'https://www.thesportsdb.com/api';
    private string $version = 'v1';
    private string $format = 'json';
    private string $key = '1';
    private string $endpoint;
    private string $query = '';

    public function __construct(ClientInterface $http)
    {
        $this->http = $http;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @throws Exception
     */
    private function buildUri(): string
    {
        if (!isset($this->endpoint)) {
            throw new Exception('Endpoint must be defined in RequestBuilder.');
        }

        return $this->baseUrl.'/'.$this->version.'/'.$this->format.'/'.$this->key.'/'.$this->endpoint.'?'.$this->query;
    }

    /**
     * @param ResponseInterface $response Response to check
     *
     * @return ResponseInterface Checked response
     *
     * @throws Exception If status code is not equal to 200
     */
    private function checkResponse(ResponseInterface $response): ResponseInterface
    {
        if (200 !== $response->getStatusCode()) {
            throw new Exception('HTTP-Error: '.$response->getReasonPhrase(), $response->getStatusCode());
        }

        return $response;
    }

    /**
     * @throws Exception
     */
    public function request(): string
    {
        try {
            return $this->checkResponse($this->http->request('GET', $this->buildUri()))->getBody();
        } catch (GuzzleException $e) {
            // Replace private API keys for log security
            $message = $e->getMessage();
            if ($this->key !== '1') {
                $message = str_replace($this->key, 'HIDDEN_KEY', $message);
            }

            throw new Exception($message);
        }
    }
}
