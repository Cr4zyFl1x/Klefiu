<?php

// Public
$app->siteManager->setSiteFile('/', '_pages/public/home.ctp');
$app->siteManager->setSiteFile('/login', '_pages/public/login.ctp');
$app->siteManager->setSiteFile('/password', '_pages/public/password.ctp');


// Private
$app->siteManager->setSiteFile('/app', '_pages/private/dashboard.ctp');

// Development
$app->siteManager->setSiteFile('/dev/test', '_pages/development/test.ctp');

// Error Sites
$app->siteManager->setErrorFiles(404, '_pages/public/404.ctp');
$app->siteManager->setErrorFiles(500, '_pages/public/500.php');
$app->siteManager->setErrorFiles(403, '_pages/public/403.php');


$app->siteManager->setSiteFile('test', 'test');

// Finally include site file
require_once $app->siteManager->getSiteFile();



