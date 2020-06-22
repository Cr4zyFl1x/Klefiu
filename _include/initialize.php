<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '_lang/' . $app->utils()->getLanguageCode() . '.php';
require_once 'siteManager.php';