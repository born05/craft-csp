# Content Security Policy plugin for Craft CMS 3.x

Content Security Policy (or CSP) generator using nonces.

## Requirements

- Craft 3.0.0

## Installation

To install the plugin, search the plugin store for "Content Security Policy" or:

`composer require born05/craft-csp`

## Setting up

Either config using `config/content-security-policy.php` or use nonces:
```
<script src="url/of/script.js" nonce="{{ cspNonce('script-src') }}"></script>
<link src="url/of/script.js" nonce="{{ cspNonce('script-src') }}"></script>
<link href="url/of/style.css" rel="stylesheet" nonce="{{ cspNonce('style-src') }}" />
```

For config options see: [Settings.php](https://github.com/born05/craft-csp/blob/master/src/models/Settings.php)

## License

Copyright © [Born05](https://www.born05.com/)

See [license](https://github.com/born05/craft-csp/blob/master/LICENSE.md)
