<?php

namespace born05\contentsecuritypolicy\twigextensions;

use born05\contentsecuritypolicy\Plugin;

use Craft;

class ContentSecurityPolicyTwigExtension extends \Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Content Security Policy';
    }

    /**
     * Returns a nonce to use like:
     *
     *      {{ cspNonce('script-src') }}
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('cspNonce', [$this, 'registerNonce']),
        ];
    }

    /**
     * Register nonce by type.
     *
     * @param string $type
     *
     * @return string
     */
    public function registerNonce(string $type)
    {
        return Plugin::$plugin->headers->registerNonce($type);
    }
}
