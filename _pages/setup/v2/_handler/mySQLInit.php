<?php
$error = array();
$result = array();
$error[0] = false;
error_reporting(0);

// DELETING DATABASE CONTENT (_handler/mySQLClearDB.php)
$error[0] = $_SESSION['error'][0];
$error[1] = $_SESSION['error'][1];

// CREATING TABLES
$sqlLines = explode(';', file_get_contents('_inc/sql/setup.sql'));
foreach ($sqlLines as $sql) {
    if (strlen(preg_replace('/\s+/', '', $sql)) > 0) {
        $result[2] = $pdo->exec($sql);
    }
}
if (!$pdo->prepare("SELECT * FROM ucms_users")->execute()) {
    $error[0] = true;
    $error[2] = true;
}


// WRITING DATA
$error[3] = false;




