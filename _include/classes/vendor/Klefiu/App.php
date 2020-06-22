<?php


namespace Klefiu;


use Klefiu\App\Auth;
use Klefiu\App\Config;
use Klefiu\App\SiteManager;
use Klefiu\App\SQL;
use Klefiu\App\Utils;

class App
{

    public $siteManager;

    public function run()
    {
        $this->siteManager = new SiteManager();
    }

    public function utils()
    {
        return new Utils();
    }

    public function sql()
    {
        return new SQL();
    }

    public function auth() {
        return new Auth();
    }

    public function config()
    {
        return new Config();
    }









}