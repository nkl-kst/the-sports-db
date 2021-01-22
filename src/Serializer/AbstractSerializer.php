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

    abstract protected function getValidJsonRootNames(): array;

    /**
     * Get the JSON root property containing data.
     *
     * @param object|null $json
     * @return string|null
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

    /**
     * Overwrite this in concrete serializers if the API returns null instead of an empty array.
     *
     * @return bool
     */
    protected function endpointReturnsNull(): bool
    {
        return false;
    }

    private function validate(?object $json): ?string
    {
        if (null === $json) {
            return 'Could not parse content.';
        }

        // Check if root exists and contains data
        if (null === $this->getJsonRootName($json) && !$this->endpointReturnsNull()) {
            return 'Wrong or empty root in JSON, expected one of ['
                .implode(', ', $this->getValidJsonRootNames()).'] to contain data.';
        }

        return null;
    }

    /**
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
        if (null === $innerJson && $this->endpointReturnsNull()) {
            return [];
        }

        return $this->mapper->mapArray($innerJson, [], $this->getEntityClass());
    }
}
