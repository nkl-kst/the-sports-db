<?php

namespace NklKst\TheSportsDb\Dependency;

use Exception;
use JsonMapper;
use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\Endpoint\HighlightEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ListEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LivescoreEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LookupEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ScheduleEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\SearchEndpoint;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Request\RequestBuilderInterface;
use NklKst\TheSportsDb\Serializer\CountrySerializer;
use NklKst\TheSportsDb\Serializer\Event\EventSerializer;
use NklKst\TheSportsDb\Serializer\Event\HighlightSerializer;
use NklKst\TheSportsDb\Serializer\Event\LineupSerializer;
use NklKst\TheSportsDb\Serializer\Event\LivescoreSerializer;
use NklKst\TheSportsDb\Serializer\Event\ResultSerializer;
use NklKst\TheSportsDb\Serializer\Event\StatisticSerializer;
use NklKst\TheSportsDb\Serializer\Event\TelevisionSerializer;
use NklKst\TheSportsDb\Serializer\Event\TimelineSerializer;
use NklKst\TheSportsDb\Serializer\LeagueSerializer;
use NklKst\TheSportsDb\Serializer\LoveSerializer;
use NklKst\TheSportsDb\Serializer\Player\ContractSerializer;
use NklKst\TheSportsDb\Serializer\Player\FormerTeamSerializer;
use NklKst\TheSportsDb\Serializer\Player\HonorSerializer;
use NklKst\TheSportsDb\Serializer\Player\PlayerSerializer;
use NklKst\TheSportsDb\Serializer\SeasonSerializer;
use NklKst\TheSportsDb\Serializer\Serializer;
use NklKst\TheSportsDb\Serializer\SerializerInterface;
use NklKst\TheSportsDb\Serializer\SportSerializer;
use NklKst\TheSportsDb\Serializer\Table\EntrySerializer;
use NklKst\TheSportsDb\Serializer\TeamSerializer;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DependencyContainer
{
    private const ENDPOINTS = [
        HighlightEndpoint::class,
        ListEndpoint::class,
        LivescoreEndpoint::class,
        LookupEndpoint::class,
        ScheduleEndpoint::class,
        SearchEndpoint::class,
    ];

    private const SERIALIZERS = [
        ContractSerializer::class,
        CountrySerializer::class,
        EntrySerializer::class,
        EventSerializer::class,
        FormerTeamSerializer::class,
        HighlightSerializer::class,
        HonorSerializer::class,
        LeagueSerializer::class,
        LineupSerializer::class,
        LivescoreSerializer::class,
        LoveSerializer::class,
        PlayerSerializer::class,
        ResultSerializer::class,
        SeasonSerializer::class,
        SportSerializer::class,
        StatisticSerializer::class,
        TeamSerializer::class,
        TelevisionSerializer::class,
        TimelineSerializer::class,
    ];

    private static ContainerBuilder $builder;

    private static function load(): void
    {
        // Don't load twice
        if (!isset(self::$builder)) {
            self::create();
            self::autowire();
            self::compile();
        }
    }

    private static function create(): void
    {
        self::$builder = new ContainerBuilder();
    }

    private static function autowire(): void
    {
        // Guzzle
        // TODO: Use interface?
        self::$builder->autowire(\GuzzleHttp\Client::class);

        // Request builder
        self::$builder
            ->autowire(RequestBuilderInterface::class, RequestBuilder::class)
            ->setShared(false);

        // Json mapper
        self::$builder->autowire(JsonMapper::class, JsonMapper::class);

        // Serializers
        self::$builder->autowire(SerializerInterface::class, Serializer::class);
        foreach (self::SERIALIZERS as $serializer) {
            self::$builder->autowire($serializer);
        }

        // Endpoints
        foreach (self::ENDPOINTS as $endpoint) {
            self::$builder
                ->autowire($endpoint)
                ->setShared(false);
        }

        // Client
        self::$builder
            ->autowire(Client::class)
            ->setPublic(true)
            ->setShared(false);
    }

    private static function compile(): void
    {
        self::$builder->compile();
    }

    private static function getDependency(string $id): ?object
    {
        // Load
        self::load();

        // Get instance
        try {
            return self::$builder->get($id);
        } catch (Exception $e) {
            return null;
        }
    }

    public static function getClient(): ?Client
    {
        $client = self::getDependency(Client::class);
        if ($client instanceof Client) {
            return $client;
        }

        return null;
    }
}
