<?php


namespace Klefiu\App;


class SQL
{

    static $pdo;

    public function __construct()
    {
        self::$pdo = new \PDO(Config::read('db_type').':host='.Config::read('db_host').';dbname='.Config::read('db_name'), Config::read('db_user'), Config::read('db_pass'));
    }


    public function executeLines($sqlLines)
    {
        $result = [];
        foreach ($sqlLines as $sql) {
            if (strlen(preg_replace('/\s+/', '', $sql)) > 0) {
                $result[] = self::getPDO()->exec($sql);
            }
        }
    }

    public static function getPDO() {
        return self::$pdo;
    }

    public static function getSetting($idNr, $result = 0)
    {
        if (is_integer($idNr)) {
            $statement = SQL::getPDO()->prepare("SELECT settingVal FROM ". Config::read('db_prefix') . "settings WHERE settingNr = :settingNr");
            $statement->execute(['settingNr' => $idNr]);
            return $statement->fetch()[$result];
        }
        $statement = SQL::getPDO()->prepare("SELECT settingVal FROM ". Config::read('db_prefix') . "settings WHERE settingID = :settingID");
        $statement->execute(['settingID' => $idNr]);
        return $statement->fetch()[$result];
    }










}