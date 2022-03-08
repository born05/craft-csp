<?php

namespace born05\contentsecuritypolicy\twigextensions;

use born05\contentsecuritypolicy\Plugin;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class ContentSecurityPolicyTwigExtension extends AbstractExtension
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
            new TwigFunction('cspNonce', [$this, 'registerNonce']),
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
