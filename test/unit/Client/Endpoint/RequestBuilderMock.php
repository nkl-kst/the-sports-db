<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use NklKst\TheSportsDb\Request\RequestBuilderInterface;

class RequestBuilderMock implements RequestBuilderInterface
{
    private string $endpoint;

    public function setVersion(string $version): RequestBuilderInterface
    {
        return $this;
    }

    public function setKey(string $key): RequestBuilderInterface
    {
        return $this;
    }

    public function setEndpoint(string $endpoint): RequestBuilderInterface
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function setQuery(string $query): RequestBuilderInterface
    {
        return $this;
    }

    public function request(): string
    {
        return $this->endpoint;
    }
}
