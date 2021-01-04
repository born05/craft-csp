<?php

namespace born05\contentsecuritypolicy\services;

use born05\contentsecuritypolicy\Plugin;

use Craft;
use craft\base\Component;

class Headers extends Component
{
    private $nonces = [];

    /**
     * Sets the CSP headers.
     */
    public function setHeaders()
    {
        $settings = Plugin::$plugin->getSettings();

        $csp = [];

        if (!empty($settings->defaultSrc)) {
            $csp['base-uri'] = $settings->baseUri;
        }

        if (!empty($settings->defaultSrc)) {
            $csp['default-src'] = $settings->defaultSrc;
        }

        if (!empty($settings->scriptSrc)) {
            $csp['script-src'] = $settings->scriptSrc;
        }

        if (!empty($settings->styleSrc)) {
            $csp['style-src'] = $settings->styleSrc;
        }

        if (!empty($settings->imgSrc)) {
            $csp['img-src'] = $settings->imgSrc;
        }

        if (!empty($settings->connectSrc)) {
            $csp['connect-src'] = $settings->connectSrc;
        }

        if (!empty($settings->fontSrc)) {
            $csp['font-src'] = $settings->fontSrc;
        }

        if (!empty($settings->objectSrc)) {
            $csp['object-src'] = $settings->objectSrc;
        }

        if (!empty($settings->mediaSrc)) {
            $csp['media-src'] = $settings->mediaSrc;
        }

        if (!empty($settings->frameSrc)) {
            $csp['frame-src'] = $settings->frameSrc;
        }

        if (!empty($settings->sandbox)) {
            $csp['sandbox'] = $settings->sandbox;
        }

        if (!empty($settings->reportUri)) {
            $csp['report-uri'] = $settings->reportUri;
        }

        if (!empty($settings->childSrc)) {
            $csp['child-src'] = $settings->childSrc;
        }

        if (!empty($settings->formAction)) {
            $csp['form-action'] = $settings->formAction;
        }

        if (!empty($settings->frameAncestors)) {
            $csp['frame-ancestors'] = $settings->frameAncestors;
        }

        if (!empty($settings->pluginTypes)) {
            $csp['plugin-types'] = $settings->pluginTypes;
        }

        if (!empty($settings->reportTo)) {
            $csp['report-to'] = $settings->reportTo;
        }

        if (!empty($settings->workerSrc)) {
            $csp['worker-src'] = $settings->workerSrc;
        }

        if (!empty($settings->manifestSrc)) {
            $csp['manifest-src'] = $settings->manifestSrc;
        }

        if (!empty($settings->navigateTo)) {
            $csp['navigate-to'] = $settings->navigateTo;
        }

        foreach ($this->nonces as $type => $nonceList) {
            foreach ($nonceList as $nonce) {
                $csp[$type][] = "'nonce-" . $nonce . "'";
            }
        }

        $cspValues = [];
        foreach ($csp as $key => $values) {
            $cspValues[] = $key . ' ' . join(' ', $values);
        }

        $cspValue = join('; ', $cspValues);

        Craft::$app->response->headers->add('Content-Security-Policy', $cspValue . ';');
        Craft::$app->response->headers->add('X-Content-Security-Policy', $cspValue . ';');
        Craft::$app->response->headers->add('X-WebKit-CSP', $cspValue . ';');
    }

    /**
     * Register nonce by type.
     *
     * @param string $type
     *
     * @return string
     */
    public function registerNonce(string $type) {
        $nonce = bin2hex(random_bytes(22));
        $this->nonces[$type][] = $nonce;

        return $nonce;
    }
}
