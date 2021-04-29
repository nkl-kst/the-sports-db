<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Filter\AbstractFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Serializer\SerializerInterface;

abstract class AbstractEndpoint
{
    protected RequestBuilder $requestBuilder;
    protected SerializerInterface $serializer;

    private Config $config;
    protected AbstractFilter $filter;

    public function __construct(RequestBuilder $requestBuilder, SerializerInterface $serializer)
    {
        $this->requestBuilder = $requestBuilder;
        $this->serializer = $serializer;
    }

    public function setConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }

    protected function setFilter(AbstractFilter $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @throws Exception
     */
    protected function request(): string
    {
        // API call configuration
        if ($key = $this->config->getKey()) {
            $this->requestBuilder->setKey($key);
        }

        // Filter query
        if (isset($this->filter)) {
            $this->requestBuilder->setQuery($this->filter->getQuery());
        }

        return $this->requestBuilder->request();
    }

    /**
     * @return mixed|null
     */
    protected function getSingleEntity(array $entities)
    {
        if (empty($entities)) {
            return null;
        }

        return $entities[0];
    }
}
