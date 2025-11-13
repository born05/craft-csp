<?php

namespace roelvanhintum\contentsecuritypolicy\variables;

use roelvanhintum\contentsecuritypolicy\Plugin;

use Craft;

class ContentSecurityPolicyVariable
{
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
