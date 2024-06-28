# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.5.0] - 2024-06-28

### Added
- Added venue search and lookup endpoints
- Added new properties to `love` entity (`strLeagueBadge`, `strLeagueLogo`, `strLeagueFanart`, `strLeagueBanner`, `strChannelLogo`, `strChannelBanner`, `strChannelFanart`)

## [1.4.8] - 2024-06-26

### Added
- Added new properties in `Love` entity
- Added new property `idVenue` in `Team` entity
- Added new property `strGroup` in `Event` entity
- BC properties for `Contract`, `Team` and `FormerTeam` entities
- Deprecation message on BC property usage

### Removed
- Removed property `strTvStation` from `Event` entity
- Removed properties `strStadiumThumb` and `strStadiumDescription` from `Team` entity

## [1.4.7] - 2024-06-10

### Added
- Added properties `strPlayerFanart` & `strPlayerBanner` to `Love` entity
- Added missing property `flag_url_32` to `Country` entity 

## [1.4.6] - 2024-05-26

### Removed
- Removed property `intChecked` from player honour entity

## [1.4.5] - 2024-04-08

### Added
- Added missing properties `idVenue` and `strVenue` to `Love` entity
- Added missing property `strHomeTeamBadge` and `strAwayTeamBadge` to `Event` entity

## [1.4.4] - 2024-02-26

### Added
- Added missing property `idVenue` to `Event` entity

## [1.4.3] - 2024-02-05

### Added
- Added missing property `idLeague` to `Honour` entity

## [1.4.2] - 2023-12-04

### Added
- Added missing property `strPlayerCutout` to `Love` entity

## [1.4.1] - 2023-11-20

### Added
- Added missing property `strSportThumbBW` to `Sport` entity

## [1.4.0] - 2023-05-28

### Added
- Optional rate limiter to throttle requests

## [1.3.9] - 2023-05-08

### Fixed
- Added missing properties `strCutout`, `strThumb` and `strRender`, removed `strEvent` in `Lineup` 
- Changed property type of `strTeam` from `int` to `string` in `Lineup`

## [1.3.8] - 2023-02-20

### Added
- Added missing properties `idWikidata` to `Player`

## [1.3.7] - 2023-01-24

### Added
- Trigger a notice if free API key is used

### Fixed
- Updated free API key to "3"

## [1.3.6] - 2022-10-24

### Added
- Added missing properties `strEthnicity` and `strStatus` in `Player` entity

## [1.3.5] - 2022-09-26

### Added
- Missing property `strStatus` in `Livescore` entity

## [1.3.4] - 2022-09-14

### Added
- Missing properties for events: `intScore`, `intScoreVotes`, `strSquare`
- Missing properties for honours: `intChecked`
- Missing properties for leagues: `intDivision`, `strInstagram`, `strTvRights`
- Missing properties for lineup: `strCountry`, `strSeason`, `strFormation`
- Missing properties for loves: `strSport`, `strEventSquare`
- Missing properties for players: `idAPIfootball`, `strPlayerAlternate`, `dateSigned`, `strWebsite`
- Missing properties for teams: `strKitColour1`, `strKitColour2`, `strKitColour3`
- Missing properties for television: `intDivision`
- Missing properties for timeline: `strCountry`

### Changed
- Throw strict mapping exceptions in tests

## [1.3.3] - 2022-08-22

### Added
- Support for Symfony 6 (`symfony/dependency-injection`)
- Build matrix entry for lowest PHP and dependency versions

## [1.3.2] - 2022-08-17

### Added
- Tests to check if all mandatory entity properties are initialized

### Fixed
- Nullable properties in `Sport` entity: `strSportIconGreen`
- Nullable properties in `League` entity: `strDivision`, `idCup`, `strCurrentSeason`, `strGender`, `strCountry`, `strNaming`, `strLocked`
- Nullable properties in `Player` entity: `dateSign`

## [1.3.1] - 2022-06-03

### Updated
- Updated guzzlehttp/guzzle to 7.4.3 (security fix)

## [1.3.0] - 2022-05-20

### Added
- Added `Honour` entity, deprecated `Honor`
- Added `honours()` in `LookupEndpoint`, deprecated `honors()`

## [1.2.1] - 2022-05-13

### Fixed
- Fixed player honours endpoint by changing endpoint URL and accepting new JSON root element
- Fixed listing country leagues by accepting new JSON root element

## [1.2.0] - 2022-04-01

### Added
- Support for equipments lookup

## [1.1.2] - 2022-04-01

### Updated
- Updated indirect dependency guzzlehttp/psr7 to 2.2.1

## [1.1.1] - 2021-11-29

### Fixed
- Fixed nullable fields intFormedYear and strDescriptionEN in league entity

## [1.1.0] - 2021-11-26

### Added
- Support for PHP 8.1

## [1.0.7] - 2021-11-22

### Fixed
- Changed free users key from "1" to "2"

## [1.0.6] - 2021-11-16

### Fixed
- Made `strSport` property in `League` entity nullable

## [1.0.5] - 2021-06-28

### Changed
- Changed PHPStan level to 6 (fixed all parameters and return type hints)

### Fixed
- Made `strSportThumb` property in `Sport` entity nullable

## [1.0.4] - 2021-06-21

### Fixed
- Fixed nullable event properties referred to teams (`strHomeTeam`, `strAwayTeam`, `idHomeTeam`, `idAwayTeam`)

## [1.0.3] - 2021-06-09

### Deprecated
- Deprecated `NklKst\TheSportsDb\Entity\Table\Entry`, use `NklKst\TheSportsDb\Entity\Table\Standing` instead

### Fixed
- Fixed table entry properties to match API fields
- Always handle `null` as an empty result in API responses to prevent mapping errors

## [1.0.2] - 2021-05-30

### Added
- Weekly cron for GitHub workflow

### Fixed
- League serializer should handle `null` response if ID was not found
- Event serializer should handle `null` response if ID was not found
- Skip schedule tests at the beginning and ending of the season

## [1.0.1] - 2021-05-04

### Fixed
- Made several entity attributes nullable to prevent parse exceptions

## [1.0.0] - 2021-05-02

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
- Fixed teams search returning `null` on unmatched query
- Lookup and search results for single entities can be null

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
