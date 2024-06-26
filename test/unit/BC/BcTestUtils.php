<?php

namespace NklKst\TheSportsDb\BC;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Check for BC properties on entities.
 */
class BcTestUtils
{
    public static function checkBcProperty(object $entity, string $bcProperty): void
    {
        TestCase::assertEquals($bcProperty, $entity->{$bcProperty});

        // TODO: How to check if PHP Deprecation has been raised (https://github.com/sebastianbergmann/phpunit/issues/5062#issuecomment-1420379762)?

        $docComment = (new ReflectionClass($entity))->getDocComment() ?: 'no comment';
        TestCase::assertMatchesRegularExpression(
            sprintf('/@property .* \$%s/', $bcProperty),
            $docComment,
            sprintf('Property annotation for BC property %s missing', $bcProperty),
        );
    }
}
