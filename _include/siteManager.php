<?php

/*
|--------------------------------------------------------------------------
| Attach site files to request path
|--------------------------------------------------------------------------
|
| Used Class to attach site files: Klefiu\App\SiteManager
| To implement dynamic request paths use '*'. (Only one per site)
| At the end call the attached site file.
|
*/

// Public
$app->siteManager->setSiteFile('/', '_pages/public/home.ctp');
$app->siteManager->setSiteFile('/login', '_pages/public/login.ctp');
$app->siteManager->setSiteFile('/forgot-password', '_pages/public/forgot_password.ctp');
$app->siteManager->setSiteFile('/forgot-password/*', '_pages/public/reset_password.ctp');

// Private
$app->siteManager->setSiteFile('/app', '_pages/private/dashboard.ctp');
$app->siteManager->setSiteFile('/app/logout', '_include/modules/logout.module');
$app->siteManager->setSiteFile('/app/account', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/details', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/profile-picture', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/password', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/preferences', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/sessions', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/login-history', '_pages/private/profile.ctp');
$app->siteManager->setSiteFile('/app/account/profile.png', '_include/modules/profilepicture_builder.module');

// Development
$app->siteManager->setSiteFile('/dev/test', '_pages/development/test.ctp');

// Error Sites
$app->siteManager->setErrorFiles(404, '_pages/public/404.ctp');
$app->siteManager->setErrorFiles(500, '_pages/public/500.php');
$app->siteManager->setErrorFiles(403, '_pages/public/403.php');

// Finally include site file
require_once $app->siteManager->getSiteFile();



