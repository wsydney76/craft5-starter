<?php

use craft\helpers\App;

$useDevServer = App::env('CRAFT_ENVIRONMENT') === 'dev' && App::env('VITE_USE_DEV_SERVER');

return [
    'checkDevServer' => $useDevServer,
    'devServerInternal' => 'http://localhost:3000/',
    'devServerPublic' => Craft::getAlias('@weburl') . ':3000',
    'errorEntry' => 'resources/js/app.js',
    'manifestPath' => Craft::getAlias('@webroot') . '/dist/assets/manifest.json',
    // 'serverPublic' => Craft::getAlias('@web')  . '/dist/assets/',
    'serverPublic' =>  '/dist/assets/',
    'useDevServer' => $useDevServer,
];
