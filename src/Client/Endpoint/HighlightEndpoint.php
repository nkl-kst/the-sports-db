<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Event\Highlight;

class HighlightEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_HIGHLIGHTS = 'eventshighlights.php';

    /**
     * @return Highlight[]
     *
     * @throws Exception
     */
    public function current(): array
    {
        $this->requestBuilder->setEndpoint(self::ENDPOINT_HIGHLIGHTS);

        return $this->serializer->serializeHighlights($this->request());
    }
}
