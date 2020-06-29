<?php
$error = array();
$result = array();
$error[0] = false;
error_reporting(0);

use Klefiu\App\SQL;
$sql = new SQL();

// DELETING DATABASE CONTENT (_handler/mySQLClearDB.php)
$error[0] = $_SESSION['error'][0];
$error[1] = $_SESSION['error'][1];

// CREATING TABLES
$conn->executeLines(explode(';', file_get_contents('_include/setup/mySQL_Template.sql')));


if (!$sql->getPDO()->prepare("SELECT * FROM klefiu_users")->execute()) {
    $error[0] = true;
    $error[2] = true;
}


// WRITING DATA
$error[3] = false;




