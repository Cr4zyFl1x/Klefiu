<?php


namespace Klefiu\App;


class Utils
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = SQL::getPDO();
    }

    public function getPanelURL()
    {
        if (SQL::getSetting('panel_domainSSL') == "true") {
            $url = "https://";
        } else {
            $url = "http://";
        }
        $url .= $this->getPanelDomain();
        $url .= $this->getPanelPath();
        return $url;
    }

    public function getPanelDomain()
    {
        return SQL::getSetting('panel_domainName');
    }

    public function getPanelPath()
    {
        return SQL::getSetting('panel_domainPath');
    }

    public function getLanguageCode() {
        if (isset($_COOKIE['KLEFIU_lang'])) {
            if (in_array($_COOKIE['KLEFIU_lang'], unserialize(SQL::getSetting('panel_localeAvailableLanguages')))) {
                return $_COOKIE['KLEFIU_lang'];
            }
        }
        return SQL::getSetting('panel_localeLanguage');
    }





}