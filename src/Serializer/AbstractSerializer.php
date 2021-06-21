<?php

namespace NklKst\TheSportsDb\Serializer;

use Exception;
use JsonMapper;

abstract class AbstractSerializer
{
    protected JsonMapper $mapper;

    public function __construct(JsonMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    abstract protected function getEntityClass(): string;

    /**
     * @return string[]
     */
    abstract protected function getValidJsonRootNames(): array;

    /**
     * Get the JSON root property containing data.
     */
    private function getJsonRootName(?object $json): ?string
    {
        foreach ($this->getValidJsonRootNames() as $rootName) {
            if (property_exists($json, $rootName)) {
                return $rootName;
            }
        }

        return null;
    }

    private function validate(?object $json): ?string
    {
        if (null === $json) {
            return 'Could not parse content.';
        }

        // Check if root exists and contains data
        if (null === $this->getJsonRootName($json)) {
            return 'Wrong or empty root in JSON, expected one of ['
                .implode(', ', $this->getValidJsonRootNames()).'] to contain data.';
        }

        return null;
    }

    /**
     * @return object[]
     *
     * @throws Exception
     */
    public function serialize(string $content): array
    {
        $json = json_decode($content);

        if ($message = $this->validate($json)) {
            throw new Exception($message);
        }

        $innerJson = $json->{$this->getJsonRootName($json)};

        // Don't serialize if the API endpoint returned null instead of an empty array
        if (null === $innerJson) {
            return [];
        }

        return $this->mapper->mapArray($innerJson, [], $this->getEntityClass());
    }
}
