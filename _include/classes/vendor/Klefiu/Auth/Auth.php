<?php


namespace Klefiu;


class Auth
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = SQL::$pdo;
    }
}