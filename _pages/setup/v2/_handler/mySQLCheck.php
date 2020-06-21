<?php
$error = false;
$run = false;
$form = array();
use Klefiu\Config;
error_reporting(0);

$form['db_host'] = "127.0.0.1";
$form['db_user'] = "ucms_app";
$form['db_name'] = "ucms_app";
$form['db_port'] = 3306;

if (constant('MYSQL_CONFIGURED')) {
    $form['db_host'] = Config::read('db_host');
    $form['db_user'] = Config::read('db_user');
    $form['db_name'] = Config::read('db_name');
    $form['db_port'] = Config::read('db_port');
}

if (isset($_GET['connect'])) {

    sleep(2);

    $form['db_host'] = trim($_POST['db_host']);
    $form['db_name'] = trim($_POST['db_name']);
    $form['db_user'] = trim($_POST['db_user']);
    $form['db_pass'] = $_POST['db_pass'];
    $form['db_port'] = trim($_POST['db_port']);

    $run = true;


    $connCheck = new mysqli($form['db_host'], $form['db_user'], $form['db_pass'], $form['db_name'], $form['db_port']);
    if ($connCheck->connect_error) {
        $error = true;
    }

    if (!$error) {
        updateSQLConfig($form['db_host'], $form['db_port'], $form['db_user'], $form['db_name'], $form['db_pass']);
    }
}