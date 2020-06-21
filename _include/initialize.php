<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'classes/autoload.php';
require_once 'config/mySQL.php';
require_once 'siteManager.php';
exit();