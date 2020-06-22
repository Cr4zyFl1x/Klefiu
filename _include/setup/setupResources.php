<?php

function updateSetupFile($filePath, $newSettings) {
    $old = get_defined_vars();
    include($filePath);
    $new = get_defined_vars();
    $fileSettings = array_diff($new, $old);
    $fileSettings = array_merge($fileSettings, $newSettings);
    $newFileStr = "<?php\n\n";
    foreach ($fileSettings as $name => $val) {
        $newFileStr .= "\${$name} = " . var_export($val, true) . ";\n";
    }
    file_put_contents($filePath, $newFileStr);
}

// Changes the MySQL Configuration File
function updateSQLConfig($db_host, $db_port, $db_user, $db_name, $db_pass) {
    file_put_contents("_include/config/mySQL.php", "");
    $file = fopen("_include/config/mySQL.php","a");
    fwrite($file,"<?php"); fwrite($file,"\n");
    fwrite($file,"// File: mySQL.php"); fwrite($file,"\n");
    fwrite($file,"// Created: " . date("Y-m-d H:i")); fwrite($file,"\n");
    fwrite($file,"// Do NOT manually edit this file, all changes will be overwritten periodically."); fwrite($file,"\n");
    fwrite($file,"// To make changes to your MySQL Connection details please use the settings page in the panel.");
    fwrite($file,"\n\r");
    fwrite($file,'// Define Class which should handle mySQL Connect.'); fwrite($file,"\n");
    fwrite($file,'define(\'MYSQL_HANDLER\', \'SQL::CLASS\');'); fwrite($file,"\n");
    fwrite($file,"\n\r");
    fwrite($file,'// Use Klefiu\App\* as namespace'); fwrite($file,"\n");
    fwrite($file,'use Klefiu\App\Config;'); fwrite($file,"\n");
    fwrite($file,'use Klefiu\App\SQL;');
    fwrite($file,"\n\r");
    fwrite($file,"// Database details: (DO NOT EDIT MANUALLY! Strings get replaced automatically!)"); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_type\', \'mysql\');'); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_host\', \''.$db_host.'\');'); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_name\', \''.$db_name.'\');'); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_user\', \''.$db_user.'\');'); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_pass\', \''.$db_pass.'\');'); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_port\', '.$db_port.');'); fwrite($file,"\n");
    fwrite($file,'Config::write(\'db_prefix\', \'klefiu_\');');
    fwrite($file,"\n\r");
    fwrite($file,'// Set MySQL Connection as configured'); fwrite($file,"\n");
    fwrite($file,'define(\'MYSQL_CONFIGURED\', true);'); fwrite($file,"\n");
    fwrite($file,"\n\r");
    fwrite($file,'// Connect now.'); fwrite($file,"\n");
    fwrite($file,'$conn = new SQL();');
    fclose($file);
}

// Returns https:// or http://
function getSiteSSL($mode) {
    if ($mode == 1) { $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; return $protocol; }
    elseif ($mode == 2) { $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "true" : "false"; return $protocol; }
    elseif ($mode == 3) { $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443; return $protocol; }
    elseif (empty($mode)) { return "ERROR"; }
}

function getSitePath() {
    $uri = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($uri);
    if (substr($parsedUrl['path'], -1, 1) != "/") {
        $return = $parsedUrl['path'] . "/";
    } else {
        $return = $parsedUrl['path'];
    }

    return $return;
}

function checkMailSyntax ($string) {
    $return =  (!preg_match("#^[a-zA-Z0-9.@-]+$#", $string)) ? false : true;
    return $return;
}

function checkAZ09Syntax ($string) {
    $return =  (!preg_match("#^[a-zA-Z0-9]+$#", $string)) ? false : true;
    return $return;
}

function checkAZString ($string) {
    $return =  (!preg_match("#^[a-zA-Z]+$#", $string)) ? false : true;
    return $return;
}