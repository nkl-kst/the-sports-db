<?php

namespace NklKst\TheSportsDb\Client;

use NklKst\TheSportsDb\Dependency\DependencyContainer;

class ClientFactory
{
    public static function create(): Client
    {
        return DependencyContainer::getClient();
    }
}
