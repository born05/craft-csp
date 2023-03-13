# Content Security Policy Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## 1.4.0 - 2023-03-13
### Changed
- Dropped `X-Content-Security-Policy` and `X-WebKit-CSP` support.

## 1.3.1 - 2021-01-19
### Fixes
- Don't break twig when `enabled` setting is false. Thanks to @clarknelson

## 1.3.0 - 2021-01-05
### Added
- Added `base-uri` support. Thanks to @clarknelson

## 1.2.1.1 - 2020-11-03
### Fixed
- Fixed composer.json for composer 2

## 1.2.1 - 2020-09-11
### Changed
- Fixed Debug Toolbar check. Thanks to @peteralewis

## 1.2.0 - 2020-06-11
### Changed
- Prevent loading when debug toolbar is on. Thanks to @peteralewis

## 1.1.1 - 2020-05-20
### Fixes
- Broken composer tag

## 1.1.0 - 2020-05-15
### Added
- Site requests only! CP breaks otherwise.

## 1.0.0 - 2020-03-16
### Added
- Initial release
