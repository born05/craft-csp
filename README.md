# Content Security Policy plugin for Craft CMS 3.x

Content Security Policy (or CSP) generator using nonces.

Currently does not work in combination with `{% js %}{% endjs %}` block code twig tags.

## Requirements

- Craft 3.0.0

## Installation

To install the plugin, search the plugin store for "Content Security Policy" or:

`composer require born05/craft-csp`

## Setting up

Either config using `config/content-security-policy.php` or use nonces:

```twig
{# Regular html #}
<script src="url/of/script.js" nonce="{{ cspNonce('script-src') }}"></script>
<link href="url/of/style.css" rel="stylesheet" nonce="{{ cspNonce('style-src') }}" />

{# Twig tags #}
{% css inlineCSS with {nonce: cspNonce('style-src')} %}
{% js 'example.js' with {nonce: cspNonce('script-src')} %}
```

Example `config/content-security-policy.php`:

```php
<?php

return [
    'enabled' => true,
    
    'reportOnly' => false,

    'baseUri' => [
        "'none'",
    ],
    'defaultSrc' => [],
    'scriptSrc' => [
        "'self'",
    ],
    'styleSrc' => [
        "'self'",
    ],
    'imgSrc' => [
        "'self'",
    ],
    'connectSrc' => [],
    'fontSrc' => [],
    'objectSrc' => [],
    'mediaSrc' => [],
    'frameSrc' => [],
    'sandbox' => [],
    'reportUri' => [],
    'childSrc' => [],
    'formAction' => [],
    'frameAncestors' => [],
    'pluginTypes' => [],
    'reportTo' => [],
    'workerSrc' => [],
    'manifestSrc' => [],
    'navigateTo' => [],
];
```

## Troubleshooting

If using the SEOMatic plugin, nonces added by that plugin will interfer with this plugin's configuration. You can disable this feature at `/admin/seomatic/plugin#tags` and re-enable the scripts with the following code:

```twig
{% do seomatic.script.get("googleAnalytics").nonce(cspNonce('script-src')) %}
```

For config options see: [Settings.php](https://github.com/born05/craft-csp/blob/craft4/src/models/Settings.php)

## License

Copyright © [Born05](https://www.born05.com/)

See [license](https://github.com/born05/craft-csp/blob/craft4/LICENSE.md)
