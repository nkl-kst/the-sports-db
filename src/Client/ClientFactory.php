<?php

namespace NklKst\TheSportsDb\Client;

use NklKst\TheSportsDb\Dependency\DependencyContainer;

/**
 * Factory to create new {@see Client} instances.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class ClientFactory
{
    /**
     * Create a new {@see Client}.
     *
     * @return Client Client
     */
    public static function create(): Client
    {
        return DependencyContainer::getClient();
    }
}
