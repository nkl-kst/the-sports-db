# TheSportsDB PHP library

![Build](https://github.com/nkl-kst/the-sports-db/workflows/Build/badge.svg)

An easy-to-use PHP library to get data from https://www.thesportsdb.com.

## Features

- Get data for lists, lookups, schedules or searches
- Get results in serialized classes
- Use your own API key
- Choose your API version
- Use PSR-4 autoloading

## Installation

Install this PHP library with [Composer](https://getcomposer.org).

```shell
> composer require nkl-kst/the-sports-db
```

## Usage

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

## Known issues

- "Patreon only" API endpoints are not implemented yet

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
