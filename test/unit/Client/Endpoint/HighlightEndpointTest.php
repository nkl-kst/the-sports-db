<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use PHPUnit\Framework\TestCase;

class HighlightEndpointTest extends TestCase
{
    private HighlightEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new HighlightEndpoint(new RequestBuilderMock(), new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testCurrentInstances(): void
    {
        $highlights = $this->endpoint->current();
        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }

    /**
     * @throws Exception
     */
    public function testCurrentEndpoint(): void
    {
        $highlight = $this->endpoint->current()[0];
        $this->assertSame('eventshighlights.php', $highlight->strVideo);
    }
}
