<?php

namespace born05\contentsecuritypolicy\models;

use craft\base\Model;

class Settings extends Model
{
    public $enabled = true;
    
    public $baseUri = [
        "'none'",
    ];
    public $defaultSrc = [];
    public $scriptSrc = [
        "'self'",
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
    public $sandbox = [];
    public $reportUri = [];
    public $childSrc = [];
    public $formAction = [];
    public $frameAncestors = [];
    public $pluginTypes = [];
    public $reportTo = [];
    public $workerSrc = [];
    public $manifestSrc = [];
    public $navigateTo = [];

    public function rules()
    {
        return [
            [['enabled'], 'boolean'],
        ];
    }
}
