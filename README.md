# TheSportsDB PHP library

[![Build](https://github.com/nkl-kst/the-sports-db/workflows/Build/badge.svg)](https://github.com/nkl-kst/the-sports-db/actions)
[![Packagist Version](https://img.shields.io/packagist/v/nkl-kst/the-sports-db)](https://packagist.org/packages/nkl-kst/the-sports-db)
[![GitHub](https://img.shields.io/github/license/nkl-kst/the-sports-db)](https://github.com/nkl-kst/the-sports-db/blob/master/LICENSE.md)

An easy-to-use PHP library to get data from https://www.thesportsdb.com.

## Features

- Get data for lists, lookups, schedules or searches
- Get results in serialized classes
- Use your own API key
- Choose your API version
- Use PSR-4 autoloading

This library uses [Semantic Versioning](https://semver.org). Until version 1.0.0 is released, breaking changes will be 
covered in feature releases (second digit). This means you should be safe using something like `^0.x.x` in your 
`composer.json`, because this will not introduce backward incompatible changes.

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

// Get next events for Liverpool FC
$client = ClientFactory::create();
$events = $client->schedule()->teamNext(133602);
echo $events[0]->strEvent;
```

See [integration tests](https://github.com/nkl-kst/the-sports-db/tree/master/test/integration) for examples of all 
[documented API calls](https://www.thesportsdb.com/api.php).

### Use your API key

Use your own Patreon API key.

```php
use NklKst\TheSportsDb\Client\ClientFactory;

// Set an API key
$client = ClientFactory::create();
$client->configure()->setKey('YOUR_API_KEY');
```

## Known issues

- These "Patreon only" features are not implemented yet:
  - Video Highlights
  - Livescores V1
  - Livescores V2 (Alpha)


## Feedback

If you have any problems or questions, feel free to open an issue. There are many possible improvements for this 
library so please let me know if you miss something or alternatively open a pull request.

## Developer notes

Run tests.

```shell
# Unit tests
> composer run-script test-unit

# Integration tests (API calls)
> composer run-script test-integration

# Ceck code
> composer run-script check-code
```

## License: MIT

See [LICENSE](LICENSE.md).
