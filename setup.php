<?php
session_start();
require_once '_include/setup/setupResources.php';
require_once '_include/classes/autoload.php';
require_once '_include/config/mySQL.php';
require_once '_storage/static/setup/setupInfo.php';
$timezone = 'Europe/Berlin';
$pagePath = $_GET['path'];
$setupFile = '_storage/static/setup/setupInfo.php';


if (!isset($pagePath) || empty($pagePath)) { $pagePath = "/setup"; }
if (!isset($setup['path'])) { $setup['path'] = "/setup"; }


if ($pData = $_GET['updatePath']) {
    $data = array(  "setup['path']" => $pData,
        "setup['lastPathUpdate']" => date('Y-m-d H:i'),
        "setup['timezone']" => $timezone,
        "setup['logoPath']" => '_assets/vendor/lavalite/img/brand.svg',
        "setup['finished']" => false);
    updateSetupFile($setupFile, $data);
    $setup['path'] = $pData;
}


if (isset($_GET['setupFinished'])) {
    $data = array(  "setup['exited']" => true);
    updateSetupFile($setupFile, $data);
    $loc = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    header('Location:' . $loc);
}


if ($pagePath !== $setup['path']) {
    sleep(3);
    header('Location: setup.php?path='.$setup['path']);
}


$siteManager = array(
    "/"                             => '_pages/setup/v2/_handler/redirect.php',
    "/setup"                        => '_pages/setup/v2/welcome.ctp',
    "/setup/requirements"           => '_pages/setup/v2/requirements.ctp',
    "/setup/sql"                    => '_pages/setup/v2/sql.ctp',
    "/setup/sql/init"               => '_pages/setup/v2/_handler/redirectSQLInit.php',
    "/setup/sql/init/result"        => '_pages/setup/v2/sqlInit.ctp',
    "/setup/sql/init/deleteData"    => '_pages/setup/v2/_handler/mySQLClearDB.php',
    "/setup/configuration"          => '_pages/setup/v2/configuration.ctp',
    "/setup/superuser"              => '_pages/setup/v2/superuser.ctp',
    "/setup/configuration/license"  => '_pages/setup/v2/licenseConfiguration.ctp',
    "/setup/finished"               => '_pages/setup/v2/finished.ctp');


// Load site
if (!$setup['finished']) {
    if (array_key_exists($pagePath, $siteManager)) {
        $arrayKey       = $pagePath;
        $siteFilePath   = $siteManager[$arrayKey];
        require_once $siteFilePath;

    } else {
        die('Site not found :(');
    }
} else {
    require_once '_inc/functions/functions.settings.inc.php';
    $loc = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    header('Location:' . $loc);
}

/*
 * SetupInfo File Template
 * File: _inc/setup/setupInfo.inc.php
 * ----------------------------------
 * <?php
 * $setup['path']       = '/setup/sql';
 *
 * $setup['finished']   = false;
 *
 */