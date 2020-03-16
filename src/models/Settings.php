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
