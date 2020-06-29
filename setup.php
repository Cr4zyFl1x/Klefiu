<?php
session_start();
$timezone = 'Europe/Berlin';
$pagePath = $_GET['path'];
$setupFile = '_storage/static/setup/setupInfo.php';
require_once '_include/setup/setupResources.php';
require_once '_include/classes/autoload.php';
require_once '_include/config/mySQL.php';
require_once $setupFile;


if (!isset($setup['lastPathUpdate'])) {
    $setup = [
        'path' => '/setup',
        'lastPathUpdate' => date('Y-m-d H:i'),
        'logoPath' => '_assets/vendor/lavalite/img/brand.svg'
    ];
}

if (($pData = $_GET['updatePath']) && !$setup['exited']) {
    $data = [
        "setup" => [
            'path' => $pData,
            'lastPathUpdate' => date('Y-m-d H:i'),
            'timezone' => $timezone,
            'logoPath' => '_assets/vendor/lavalite/img/brand.svg',
            'exited' => false
        ]];
    updateSetupFile($setupFile, $data);
    $setup['path'] = $pData;
}


if (isset($_GET['setupFinished'])) {
    $data = [
        "setup" => [
            'lastPathUpdate' => date('Y-m-d H:i'),
            'exited' => true
        ]];
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
if (!$setup['exited']) {
    if (array_key_exists($pagePath, $siteManager)) {
        $arrayKey       = $pagePath;
        $siteFilePath   = $siteManager[$arrayKey];
        require_once $siteFilePath;

    } else {
        die('Site not found :(');
    }
} else {
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