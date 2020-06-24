<?php
// Var init
$form = array();
$error = false;
$form['status'] = "";

// Use Namespace
use Klefiu\App\SQL;

// Panel settings
if (empty($_POST['panel_domainSSL'])) { $form['panel_domainSSL'] = getSiteSSL(2); } else { $form['panel_domainSSL'] = $_POST['panel_domainSSL']; }
if (empty($_POST['panel_domainName'])) { $form['panel_domainName'] = $_SERVER['HTTP_HOST']; } else { $form['panel_domainName'] = $_POST['panel_domainName']; }
if (empty($_POST['panel_domainPath'])) { $form['panel_domainPath'] = substr(getSitePath(), 0, -10); } else { $form['panel_domainPath'] = $_POST['panel_domainPath']; }

// Locale settings
if (empty($_POST['panel_localeTimezone'])) { $form['panel_localeTimezone'] = "Europe/Berlin"; } else { $form['panel_localeTimezone'] = $_POST['panel_localeTimezone']; }
if (empty($_POST['panel_localeLanguage'])) { $form['panel_localeLanguage'] = "en_US"; } else { $form['panel_localeLanguage'] = $_POST['panel_localeLanguage']; }
if (empty($_POST['panel_localeDateformat'])) { $form['panel_localeDateformat'] = "d.m.Y"; } else { $form['panel_localeDateformat'] = $_POST['panel_localeDateformat']; }

// Mail settings
if (empty($_POST['mail_smtp_host'])) { $form['mail_smtp_host'] = ""; } else { $form['mail_smtp_host'] = $_POST['mail_smtp_host']; }
if (empty($_POST['mail_smtp_auth'])) { $form['mail_smtp_auth'] = "true"; } else { $form['mail_smtp_auth'] = $_POST['mail_smtp_auth']; }
if (empty($_POST['mail_smtp_user'])) { $form['mail_smtp_user'] = ""; } else { $form['mail_smtp_user'] = $_POST['mail_smtp_user']; }
if (empty($_POST['mail_smtp_pass'])) { $form['mail_smtp_pass'] = ""; } else { $form['mail_smtp_pass'] = $_POST['mail_smtp_pass']; }
if (empty($_POST['mail_smtp_sender'])) { $form['mail_smtp_sender'] = ""; } else { $form['mail_smtp_sender'] = $_POST['mail_smtp_sender']; }
if (empty($_POST['mail_smtp_port'])) { $form['mail_smtp_port'] = 587; } else { $form['mail_smtp_port'] = $_POST['mail_smtp_port']; }
if (empty($_POST['mail_smtp_encryption'])) { $form['mail_smtp_encryption'] = "tls"; } else { $form['mail_smtp_encryption'] = $_POST['mail_smtp_encryption']; }

if (isset($_GET['check'])) {

    if (substr($form['panel_domainPath'], -1) !== "/" || substr($form['panel_domainPath'], 0, 1) !== "/") {
        $error = true;
        $form['status'] = "Panel Path must start and end with slash! (/)";
    }
    if (!$error && !(preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $form['panel_domainName']) //valid chars check
            && preg_match("/^.{1,253}$/", $form['panel_domainName']) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $form['panel_domainName']))) {
        $error = true;
        $form['status'] = "Panel domain name is invalid!";
    }
    if (!$error && substr($form['panel_localeLanguage'], -3, 1) !== "_") {
        $error = true;
        $form['status'] = "Language code has a wrong format!";
    }


    if (!$error) {
        $query = SQL::getPDO()->prepare("INSERT INTO klefiu_settings (settingNr, settingID, settingVal, settingDescription) VALUES (:settingNr, :settingID, :settingVal, :settingDescription)");
        sleep(2);

        $result['panel_operatorName']               = $query->execute(array('settingNr' => 101, 'settingID' => "panel_operatorName", 'settingVal' => 'My Company, LLC.', 'settingDescription' => "Website operator -> string"));
        $result['panel_copyrightInfo']              = $query->execute(array('settingNr' => 102, 'settingID' => "panel_copyrightInfo", 'settingVal' => 'Copyright (c) 2019-2020 - Sarpex IT Services GmbH', 'settingDescription' => "Copyright information -> string"));
        $result['panel_localeTimezone']             = $query->execute(array('settingNr' => 103, 'settingID' => "panel_localeTimezone", 'settingVal' => $form['panel_localeTimezone'], 'settingDescription' => "Timezone Region/City -> string"));
        $result['panel_localeLanguage']             = $query->execute(array('settingNr' => 104, 'settingID' => "panel_localeLanguage", 'settingVal' => $form['panel_localeLanguage'], 'settingDescription' => "Language code en_US -> string"));
        $result['panel_localeAvailableLanguages']   = $query->execute(array('settingNr' => 105, 'settingID' => "panel_localeAvailableLanguages", 'settingVal' => serialize(['de_DE', 'en_US']), 'settingDescription' => "Languages -> serialized Array"));
        $result['panel_localeDateformat']           = $query->execute(array('settingNr' => 106, 'settingID' => "panel_localeDateformat", 'settingVal' => $form['panel_localeDateformat'], 'settingDescription' => "Dateformat -> string"));
        $result['panel_metaDescription']            = $query->execute(array('settingNr' => 107, 'settingID' => "panel_metaDescription", 'settingVal' => 'The Ultimate Customer Management System is an web based app to manage services for customers.', 'settingDescription' => "Panel description -> string"));
        $result['panel_metaKeywords']               = $query->execute(array('settingNr' => 108, 'settingID' => "panel_metaKeywords", 'settingVal' => 'Customer management, Hosting, DNS, Webspace, VPS, vServer, PowerDNS', 'settingDescription' => "Panel keywords -> string"));
        $result['panel_navigationTitle']            = $query->execute(array('settingNr' => 109, 'settingID' => "panel_navigationTitle", 'settingVal' => 'Klefiu - Panel', 'settingDescription' => "Navigation title -> string"));
        $result['panel_title']                      = $query->execute(array('settingNr' => 110, 'settingID' => "panel_title", 'settingVal' => 'Klefiu', 'settingDescription' => "Panel title -> string"));
        $result['panel_defaultUserGroup']           = $query->execute(array('settingNr' => 111, 'settingID' => "panel_defaultUserGroup", 'settingVal' => 3, 'settingDescription' => "Default user group -> int"));
        $result['panel_mailLookupType']             = $query->execute(array('settingNr' => 112, 'settingID' => "panel_mailLookupType", 'settingVal' => 'modal', 'settingDescription' => "Mail monitoring type -> string"));
        $result['panel_domainSSL']                  = $query->execute(array('settingNr' => 113, 'settingID' => "panel_domainSSL", 'settingVal' => $form['panel_domainSSL'], 'settingDescription' => "Domain SSL -> string/boolean"));
        $result['panel_domainName']                 = $query->execute(array('settingNr' => 114, 'settingID' => "panel_domainName", 'settingVal' => $form['panel_domainName'], 'settingDescription' => "Domain name -> string"));
        $result['panel_domainPath']                 = $query->execute(array('settingNr' => 115, 'settingID' => "panel_domainPath", 'settingVal' => $form['panel_domainPath'], 'settingDescription' => "Panel path -> string"));
        $result['panel_imprint']                    = $query->execute(array('settingNr' => 116, 'settingID' => "panel_imprint", 'settingVal' => null, 'settingDescription' => "Imprint URL -> string"));
        $result['panel_tablePageEntries']           = $query->execute(array('settingNr' => 117, 'settingID' => "panel_tablePageEntries", 'settingVal' => 10, 'settingDescription' => "Table entries per page  -> int"));
        $result['panel_passwordRequestDelay']       = $query->execute(array('settingNr' => 118, 'settingID' => "panel_passwordRequestDelay", 'settingVal' => 300, 'settingDescription' => "Time between password reset requests  -> string"));

        $result['mail_sendername']                  = $query->execute(array('settingNr' => 201, 'settingID' => "mail_sendername", 'settingVal' => 'Klefiu - File uploader', 'settingDescription' => "Name displayed as Sender -> string"));
        $result['mail_templateLogo']                = $query->execute(array('settingNr' => 202, 'settingID' => "mail_template_logo", 'settingVal' => '_assets/klefiu/img/logo_mail.png', 'settingDescription' => "Mail header logo path -> string"));
        $result['mail_replyAddress']                = $query->execute(array('settingNr' => 203, 'settingID' => "mail_reply_address", 'settingVal' => null, 'settingDescription' => "Reply email -> string"));
        $result['mail_smtp_host']                   = $query->execute(array('settingNr' => 204, 'settingID' => "mail_smtp_host", 'settingVal' => $form['mail_smtp_host'], 'settingDescription' => "SMTP Host -> string"));
        $result['mail_smtp_auth']                   = $query->execute(array('settingNr' => 205, 'settingID' => "mail_smtp_auth", 'settingVal' => $form['mail_smtp_auth'], 'settingDescription' => "SMTP Auth -> string/boolean"));
        $result['mail_smtp_encryption']             = $query->execute(array('settingNr' => 206, 'settingID' => "mail_smtp_encryption", 'settingVal' => $form['mail_smtp_encryption'], 'settingDescription' => "SMTP Encryption -> string/boolean"));
        $result['mail_smtp_user']                   = $query->execute(array('settingNr' => 207, 'settingID' => "mail_smtp_user", 'settingVal' => $form['mail_smtp_user'], 'settingDescription' => "SMTP User -> string"));
        $result['mail_smtp_pass']                   = $query->execute(array('settingNr' => 208, 'settingID' => "mail_smtp_pass", 'settingVal' => $form['mail_smtp_pass'], 'settingDescription' => "SMTP Password -> string"));
        $result['mail_smtp_port']                   = $query->execute(array('settingNr' => 209, 'settingID' => "mail_smtp_port", 'settingVal' => $form['mail_smtp_port'], 'settingDescription' => "SMTP Port -> int"));
        $result['mail_smtp_sender']                 = $query->execute(array('settingNr' => 210, 'settingID' => "mail_smtp_sender", 'settingVal' => $form['mail_smtp_sender'], 'settingDescription' => "Mail sender adress -> string"));

        $result['license_key']                      = $query->execute(array('settingNr' => 601, 'settingID' => "license_key", 'settingVal' => null, 'settingDescription' => "License key -> string"));
        $result['license_owner']                    = $query->execute(array('settingNr' => 602, 'settingID' => "license_owner", 'settingVal' => null, 'settingDescription' => "License owner -> string"));
        $result['license_validity']                 = $query->execute(array('settingNr' => 603, 'settingID' => "license_validity", 'settingVal' => null, 'settingDescription' => "License valid until -> string"));
        $result['license_created']                  = $query->execute(array('settingNr' => 604, 'settingID' => "license_created", 'settingVal' => null, 'settingDescription' => "License valid from -> string"));
        $result['license_name']                     = $query->execute(array('settingNr' => 605, 'settingID' => "license_name", 'settingVal' => null, 'settingDescription' => "License name -> string"));
        $result['license_product']                  = $query->execute(array('settingNr' => 606, 'settingID' => "license_product", 'settingVal' => null, 'settingDescription' => "Licensed Product -> string"));
        $result['license_lastUpdate']               = $query->execute(array('settingNr' => 607, 'settingID' => "license_lastUpdate", 'settingVal' => null, 'settingDescription' => "Last time key changed -> string"));
        $result['license_lastDataUpdate']           = $query->execute(array('settingNr' => 608, 'settingID' => "license_lastDataUpdate", 'settingVal' => null, 'settingDescription' => "Last time Key Information fetched from license server -> string"));





        $result['config_configured']                = $query->execute(array('settingNr' => 5000, 'settingID' => "config_configured", 'settingVal' => 'true', 'settingDescription' => "Configuration status -> string/boolean"));


        if ($result['config_configured']) {
            header('Location: setup.php?path=/setup/configuration&updatePath=/setup/superuser');
        }
        else {
            $error = true;
            $form['status'] = "Failed to write data into the database!";
        }
    }



}