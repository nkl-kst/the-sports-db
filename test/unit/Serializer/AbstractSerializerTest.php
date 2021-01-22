<?php

namespace NklKst\TheSportsDb\Serializer;

use Exception;
use JsonMapper;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Serializer\Event\LivescoreSerializer;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;
use stdClass;

class AbstractSerializerTest extends TestCase
{
    private CountrySerializer $serializer;

    protected function setUp(): void
    {
        $this->serializer = new CountrySerializer(new JsonMapper());
    }

    public function testGetJsonRootNameNull(): void
    {
        $method = TestUtils::getHiddenMethod($this->serializer, 'getJsonRootName');
        $this->assertNull($method(new stdClass()));
    }

    public function testGetJsonRootNameValid(): void
    {
        $object = new stdClass();
        $object->countries = 'dummy';

        $method = TestUtils::getHiddenMethod($this->serializer, 'getJsonRootName');
        $this->assertSame('countries', $method($object));
    }

    public function testValidateJsonNull(): void
    {
        $method = TestUtils::getHiddenMethod($this->serializer, 'validate');
        $this->assertSame('Could not parse content.', $method(null));
    }

    public function testValidateJsonRootNull(): void
    {
        $method = TestUtils::getHiddenMethod($this->serializer, 'validate');
        $this->assertSame(
            'Wrong or empty root in JSON, expected one of [countries] to contain data.',
            $method(new stdClass()));
    }

    public function testValidateValid(): void
    {
        $object = new stdClass();
        $object->countries = 'dummy';

        $method = TestUtils::getHiddenMethod($this->serializer, 'validate');
        $this->assertNull($method($object));
    }

    /**
     * @throws Exception
     */
    public function testSerializeInvalid(): void
    {
        $this->expectExceptionObject(new Exception('Could not parse content.'));
        $this->serializer->serialize('');
    }

    /**
     * @throws Exception
     */
    public function testSerializeNull(): void
    {
        $livescoreSerializer = new LivescoreSerializer(new JsonMapper());
        $livescores = $livescoreSerializer->serialize('{ "events": null }');

        $this->assertNotNull($livescores);
        $this->assertEmpty($livescores);
    }

    /**
     * @throws Exception
     */
    public function testSerializeValid(): void
    {
        $this->assertContainsOnlyInstancesOf(
            Country::class,
            $this->serializer->serialize('{ "countries": [] }'));
    }
}
