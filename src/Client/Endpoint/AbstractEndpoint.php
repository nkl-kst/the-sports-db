<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Filter\AbstractFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Serializer\Serializer;

abstract class AbstractEndpoint
{
    protected RequestBuilder $requestBuilder;
    protected Serializer $serializer;

    private Config $config;
    protected AbstractFilter $filter;

    public function __construct(RequestBuilder $requestBuilder, Serializer $serializer)
    {
        $this->requestBuilder = $requestBuilder;
        $this->serializer = $serializer;
    }

    /**
     * @return $this
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return $this
     */
    protected function setFilter(AbstractFilter $filter)
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
