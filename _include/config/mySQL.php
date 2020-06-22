<?php
// File: mySQL.php
// Created: 2020-06-22 00:55
// Do NOT manually edit this file, all changes will be overwritten periodically.
// To make changes to your MySQL Connection details please use the settings page in the panel.

// Define Class which should handle mySQL Connect.
define('MYSQL_HANDLER', 'SQL::CLASS');

// Use Klefiu\App\* as namespace
use Klefiu\App\Config;
use Klefiu\App\SQL;

// Database details: (DO NOT EDIT MANUALLY! Strings get replaced automatically!)
Config::write('db_type', 'mysql');
Config::write('db_host', '127.0.0.1');
Config::write('db_name', 'NaN');
Config::write('db_user', 'NaN');
Config::write('db_pass', 'NaN');
Config::write('db_port', 3306);
Config::write('db_prefix', 'klefiu_');

// Set MySQL Connection as configured
define('MYSQL_CONFIGURED', false);

// Connect now.
$conn = new SQL();