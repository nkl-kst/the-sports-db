# TheSportsDB PHP library

[![Build](https://github.com/nkl-kst/the-sports-db/workflows/Build/badge.svg)](https://github.com/nkl-kst/the-sports-db/actions)
[![Packagist Version](https://img.shields.io/packagist/v/nkl-kst/the-sports-db)](https://packagist.org/packages/nkl-kst/the-sports-db)
[![Coverage Status](https://coveralls.io/repos/github/nkl-kst/the-sports-db/badge.svg?branch=main)](https://coveralls.io/github/nkl-kst/the-sports-db?branch=main)
[![PHPStan Level](https://img.shields.io/badge/PHPStan-level%209-brightgreen.svg?style=flat)](https://github.com/nkl-kst/the-sports-db/actions)
[![GitHub](https://img.shields.io/github/license/nkl-kst/the-sports-db)](https://github.com/nkl-kst/the-sports-db/blob/main/LICENSE.md)

An easy-to-use PHP library to get data from https://www.thesportsdb.com.

## Features

- Get data for lists, livescores, lookups, schedules, searches or video highlights
- Get results in serialized classes
- Use your own API key
- Throttle long-running scripts
- Use PSR-4 autoloading
- Supports PHP 7.4+

This library uses [Semantic Versioning](https://semver.org).

## Installation

Install this PHP library with [Composer](https://getcomposer.org).

```shell
> composer require nkl-kst/the-sports-db
```

## Usage

### Get data

Get sports data from TheSportsDB.

```php
// You need to load the Composer autoload file somewhere in your code before
require_once 'vendor/autoload.php';

use NklKst\TheSportsDb\Client\ClientFactory;

// Create a client
$client = ClientFactory::create();

// Get soccer livescores
$livescores = $client->livescore()->now('Soccer');
echo $livescores[0]->strProgress;

// Get video highlights
$highlights = $client->highlight()->latest();
echo $highlights[0]->strVideo;

// Get next events for Liverpool FC
$events = $client->schedule()->teamNext(133602);
echo $events[0]->strEvent;
```

See [integration tests](https://github.com/nkl-kst/the-sports-db/tree/main/test/integration) for examples of all 
[documented API calls](https://www.thesportsdb.com/api.php).

### Use your API key

Use your own Patreon API key.

```php
use NklKst\TheSportsDb\Client\ClientFactory;

// Set an API key
$client = ClientFactory::create();
$client->configure()->setKey('YOUR_API_KEY');
```

### Throttle requests

You are advised to do no more than 100 requests per minute to TheSportsDB API (the hard limit is two requests per
second). If you have long-running scripts to gather many data, please consider to use the built-in rate limiter.

```php
use NklKst\TheSportsDb\Client\ClientFactory;

// Use the default rate limit of 100 requests per minute
$client = ClientFactory::create();
$client->configure()->setRateLimiter();

// Do your requests as usual

// You can unset the rate limiter later
$client->configure()->unsetRateLimiter();
```

As this library uses the [Symfony Rate Limiter Component](https://github.com/symfony/rate-limiter), it's possible to use
a custom rate limit mechanism. Please consult the Symfony
[documentation](https://symfony.com/doc/current/rate_limiter.html) for more information.

## Known issues

- Livescores for v1 are not supported.
- If you are getting an exception like `JSON property "foo" in class "Bar" must not be NULL`, then there is an entity 
attribute which should be nullable. Please open a new issue in this case.

## Feedback

If you have any problems or questions, feel free to open an issue or a pull request.

## Developer notes

Run tests and code checks.

```shell
# Unit tests
> composer test-unit

# Integration tests (API calls, Patreon key required)
> PATREON_KEY=<YOUR_PATREON_KEY> composer test-integration
# On Windows use 'set PATREON_KEY=<YOUR_PATERON_KEY>' before running the tests

# Analyze code (static analysis)
> composer analyze-code

# Check code (coding standards)
> composer check-code
```

## License: MIT

See [LICENSE](LICENSE.md).
