<?php
error_reporting(0);

// CLEARING DATABASE
$result[0] = $pdo->prepare("DROP DATABASE " . $conn['db_name'])->execute();
$result[1] = $pdo->prepare("CREATE DATABASE " . $conn['db_name'])->execute();

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