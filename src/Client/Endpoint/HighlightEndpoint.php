<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use DateTime;
use Exception;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Filter\HighlightFilter;

/**
 * Highlight endpoints.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class HighlightEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_HIGHLIGHTS = 'eventshighlights.php';

    /**
     * Get latest highlights for a day, league or sport query.
     *
     * @param ?DateTime $day        Highlights date
     * @param ?string   $league     Highlights league
     * @param ?string   $sportQuery Highlights sport query
     *
     * @return Highlight[] Found highlights
     *
     * @throws Exception
     */
    public function latest(DateTime $day = null, string $league = null, string $sportQuery = null): array
    {
        $filter = new HighlightFilter();
        if ($day) {
            $filter->setDay($day);
        }
        if ($league) {
            $filter->setLeague($league);
        }
        if ($sportQuery) {
            $filter->setSportQuery($sportQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_HIGHLIGHTS);

        return $this->serializer->serializeHighlights($this->request());
    }
}
