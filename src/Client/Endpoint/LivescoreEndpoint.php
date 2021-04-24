<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Event\Livescore;
use NklKst\TheSportsDb\Filter\LivescoreFilter;

/**
 * Livescore endpoints (v2).
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class LivescoreEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_LIVESCORE = 'livescore.php';
    private const VERSION_LIVESCORE = 'v2';

    /**
     * Get all current livescores by sport or league.
     *
     * @param ?string $sport    Sport filter
     * @param ?int    $leagueID League filter
     *
     * @return Livescore[] Current livescores
     *
     * @throws Exception
     */
    public function now(string $sport = null, int $leagueID = null): array
    {
        $filter = new LivescoreFilter();
        if ($leagueID) {
            $filter->setLeagueID($leagueID);
        }

        // Fix for missing sport parameter in API requests, which raises a PHP notice in responses and therefore JSON
        // parsing errors occur.
        $filter->setSport($sport ?: '');

        $this
            ->setFilter($filter)
            ->requestBuilder
                ->setEndpoint(self::ENDPOINT_LIVESCORE)
                ->setVersion(self::VERSION_LIVESCORE);

        return $this->serializer->serializeLivescores($this->request());
    }
}
