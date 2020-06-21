<?php


namespace Klefiu;


class SQL
{

    static $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(Config::read('db_type').':host='.Config::read('db_host').';dbname='.Config::read('db_name'), Config::read('db_user'), Config::read('db_pass'));
    }


    public function executeLines($sqlLines)
    {
        $result = [];
        foreach ($sqlLines as $sql) {
            if (strlen(preg_replace('/\s+/', '', $sql)) > 0) {
                $result[] = $this->pdo->exec($sql);
            }
        }
    }

    public static function getPDO() {
        return self::$pdo;
    }








}