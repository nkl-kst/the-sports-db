<?php

namespace NklKst\TheSportsDb\Request;

use Exception;

interface RequestBuilderInterface
{
    public function setVersion(string $version): self;

    public function setKey(string $key): self;

    public function setEndpoint(string $endpoint): self;

    public function setQuery(string $query): self;

    /**
     * @throws Exception
     */
    public function request(): string;
}
