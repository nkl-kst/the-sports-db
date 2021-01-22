<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use DateTime;
use Exception;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Filter\HighlightFilter;

class HighlightEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_HIGHLIGHTS = 'eventshighlights.php';

    /**
     * @return Highlight[]
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
