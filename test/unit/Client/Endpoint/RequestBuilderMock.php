<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use NklKst\TheSportsDb\Request\RequestBuilderInterface;

class RequestBuilderMock implements RequestBuilderInterface
{
    public string $key = 'dummyKey';
    public string $query = 'dummyQuery';
    public string $endpoint = 'dummyEndpoint';

    public function setVersion(string $version): RequestBuilderInterface
    {
        return $this;
    }

    public function setKey(string $key): RequestBuilderInterface
    {
        $this->key = $key;

        return $this;
    }

    public function setEndpoint(string $endpoint): RequestBuilderInterface
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function setQuery(string $query): RequestBuilderInterface
    {
        $this->query = $query;

        return $this;
    }

    public function request(): string
    {
        return $this->endpoint;
    }
}
