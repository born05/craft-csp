# Content Security Policy plugin for Craft CMS 3.x

Content Security Policy (or CSP) generator using nonces.

Currently does not work in combination with `{% js %}` or `{% css %}` twig tags.

## Requirements

- Craft 3.0.0

## Installation

To install the plugin, search the plugin store for "Content Security Policy" or:

`composer require born05/craft-csp`

## Setting up

Either config using `config/content-security-policy.php` or use nonces:

```twig
<script src="url/of/script.js" nonce="{{ cspNonce('script-src') }}"></script>
<link href="url/of/style.css" rel="stylesheet" nonce="{{ cspNonce('style-src') }}" />

{% css inlineCSS with {nonce: cspNonce('style-src')} %}
```

Example `config/content-security-policy.php`:

```php
<?php

namespace born05\contentsecuritypolicy\models;

use craft\base\Model;

class Settings extends Model
{
    public $enabled = true;
    
    public $defaultSrc = [];
    public $scriptSrc = [
        "'self'",
        // "'unsafe-inline'",
        // "'unsafe-eval'",
    ];
    public $styleSrc = [
        "'self'",
    ];
    public $imgSrc = [
        "'self'",
    ];
    public $connectSrc = [];
    public $fontSrc = [];
    public $objectSrc = [];
    public $mediaSrc = [];
    public $frameSrc = [];
    public $sandbox = [
        // "'allow-forms'",
        // "'allow-same-origin'",
        // "'allow-scripts allow-popups'",
        // "'allow-modals'",
        // "'allow-orientation-lock'",
        // "'allow-pointer-lock'",
        // "'allow-presentation'",
        // "'allow-popups-to-escape-sandbox'",
        // "'allow-top-navigation'",
    ];
    public $reportUri = [];
    public $childSrc = [];
    public $formAction = [];
    public $frameAncestors = [];
    public $pluginTypes = [];
    public $reportTo = [];
    public $workerSrc = [
        // 'blob:',
    ];
    public $manifestSrc = [];
    public $navigateTo = [];

    public function rules()
    {
        return [
            [['enabled'], 'boolean'],
        ];
    }
}
```

## Troubleshooting

If using the SEOMatic plugin, nonces added by that plugin will interfer with this plugin's configuration. You can disable this feature at `/admin/seomatic/plugin#tags` and re-enable the scripts with the following code:

```twig
{% do seomatic.script.get("googleAnalytics").nonce(cspNonce('script-src')) %}
```

For config options see: [Settings.php](https://github.com/born05/craft-csp/blob/master/src/models/Settings.php)

## License

Copyright © [Born05](https://www.born05.com/)

See [license](https://github.com/born05/craft-csp/blob/master/LICENSE.md)
