<?php

namespace roelvanhintum\contentsecuritypolicy;

use roelvanhintum\contentsecuritypolicy\services\Headers as HeadersService;
use roelvanhintum\contentsecuritypolicy\models\Settings;

use roelvanhintum\contentsecuritypolicy\variables\ContentSecurityPolicyVariable;
use roelvanhintum\contentsecuritypolicy\twigextensions\ContentSecurityPolicyTwigExtension;

use Craft;
use craft\base\Plugin as CraftPlugin;
use craft\elements\User;
use craft\web\View;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

class Plugin extends CraftPlugin
{
    public static Plugin $plugin;

    public string $schemaVersion = '1.0.0';

    /**
     * Init the plugin.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $this->setComponents([
            'headers' => HeadersService::class,
        ]);

        if (!$this->isInstalled || !Craft::$app->getRequest()->getIsSiteRequest()) return;

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new ContentSecurityPolicyTwigExtension());

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function () {
            $settings = $this->getSettings();
            if (!$settings->enabled) return;

            // Register our variables
            Event::on(
                CraftVariable::class,
                CraftVariable::EVENT_INIT,
                function (Event $event) {
                    /** @var CraftVariable $variable */
                    $variable = $event->sender;
                    $variable->set('csp', ContentSecurityPolicyVariable::class);
                }
            );

            // Prevent loading when debug toolbar is on.
            $user = Craft::$app->getUser()->getIdentity();

            if ($user instanceof User && $user->getPreference('enableDebugToolbarForSite')) return;

            Event::on(
                View::class,
                View::EVENT_END_PAGE,
                function (Event $event) {
                    /** @var CraftVariable $variable */
                    $variable = $event->sender;

                    // The page is done rendering, include our headers.
                    $this->headers->setHeaders();
                }
            );
        });
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): Settings
    {
        return new Settings();
    }
}
