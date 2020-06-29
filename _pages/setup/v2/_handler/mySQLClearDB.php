<?php
error_reporting(0);
use Klefiu\App\SQL;
use Klefiu\App\Config;

$sql = new SQL();

// CLEARING DATABASE
$result = [];
$result[0] = $sql->getPDO()->prepare("DROP DATABASE " . Config::read('db_name'))->execute();
$result[1] = $sql->getPDO()->prepare("CREATE DATABASE " . Config::read('db_name'))->execute();

if (!$result[0] || !$result[1]) {
    $error[0] = true;
    $error[1] = true;
    $_SESSION['error'][0] = true;
    $_SESSION['error'][1] = true;
} else {
    $_SESSION['error'][0] = false;
    $_SESSION['error'][1] = false;
}
header('Location: setup.php?path=/setup/sql/init/clearData&updatePath=/setup/sql/init/result');