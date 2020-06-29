<?php


namespace Klefiu\App;


use Klefiu\App;

class SQL extends App
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(Config::read('db_type').':host='.Config::read('db_host').';dbname='.Config::read('db_name'), Config::read('db_user'), Config::read('db_pass'));
    }

    public function executeLines($sqlLines)
    {
        $result = [];
        foreach ($sqlLines as $sql) {
            if (strlen(preg_replace('/\s+/', '', $sql)) > 0) {
                $result[] = $this->getPDO()->exec($sql);
            }
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}