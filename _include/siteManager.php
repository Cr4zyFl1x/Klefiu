<?php

use Klefiu\SiteManager;

$siteManager = new SiteManager();

// Public
$siteManager->setSiteFile('/', '_pages/public/home.ctp');
$siteManager->setSiteFile('/login', '_pages/public/login.ctp');
$siteManager->setSiteFile('/register', '_pages/public/register.ctp');

// Private
$siteManager->setSiteFile('/app', '_pages/private/dashboard.ctp');

// Error Sites
$siteManager->setErrorFiles(404, '_pages/public/404.php');
$siteManager->setErrorFiles(500, '_pages/public/500.php');
$siteManager->setErrorFiles(403, '_pages/public/403.php');

// Finally include site file
require_once $siteManager->getSiteFile();



