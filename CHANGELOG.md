# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - Unreleased

### Added
- Dev dependency php-coveralls/php-coveralls
- Coverage report badge
- Public API method documentation

### Changed
- Use Guzzle ClientInterface in DependencyContainer
- Changelog format to https://keepachangelog.com/en/1.0.0/
- Updated guzzlehttp/guzzle to 7.3.0
- Updated netresearch/jsonmapper to v4.0.0
- Updated symfony/dependency-injection to v5.2.6
- Updated friendsofphp/php-cs-fixer to v2.18.5
- Updated phpunit/phpunit to 9.5.4

### Fixed
- Don't reuse clients and endpoints in DependencyContainer
- `idAPIfootball` in class `NklKst\TheSportsDb\Entity\Team` is now nullable

### Removed
- API version configuration support

## [0.1.2] - 2021-01-23

### Added
- Highlight videos support
- Livescore v2 support

## [0.1.1] - 2021-01-18

### Added
- Most "Patreon only" features
  
### Changed
- Bumped libs

## [0.1.0] - 2020-12-30
- Initial release
