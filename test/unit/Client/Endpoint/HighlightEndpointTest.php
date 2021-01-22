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
    public function testLatestInstances(): void
    {
        $highlights = $this->endpoint->latest();
        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }

    /**
     * @throws Exception
     */
    public function testLatestEndpoint(): void
    {
        $highlight = $this->endpoint->latest()[0];
        $this->assertSame('eventshighlights.php', $highlight->strVideo);
    }
}
