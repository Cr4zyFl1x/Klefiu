<?php


namespace Klefiu\App;


use Klefiu\App\Auth\User;

class Auth
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = SQL::getPDO();
    }

    public function userLogin($username, $password, $rememberme = false)
    {
        $return = ['data' => ['error' => [], 'success' => false]];
        $error = false;

        $statement = SQL::getPDO()->prepare("SELECT * FROM " . Config::read('db_prefix') ."users WHERE username = :username");
        $result = $statement->execute(['username' => $username]);
        $userData = $statement->fetch();

        if ($userData !== null && password_verify($password, $userData['password'])) {

            if ($this->checkForIPBan($_SERVER['REMOTE_ADDR'], $userData['ID'])) {
                $error = true;
                $return['data']['error'] = 'ipbanned';
                $return['data']['success'] = false;
            }

            if (!$error && $rememberme) {
                $identityToken = sha1(rand(5, 50000000));
                $secureToken = sha1(rand(5, 50000000));

                $setToken = SQL::getPDO()->prepare("INSERT INTO " . Config::read('db_prefix') . "reloginTokens (userID, identityToken, secureToken) VALUES (:uID, :iT, :sT)");
                $setToken->execute(['uID' => $userData['ID'], 'iT' => $identityToken, 'sT' => sha1($secureToken)]);

                setcookie("KLEFIU_identityToken", $identityToken, time()+(3600*24*365), '/');
                setcookie("KLEFIU_secureToken", $secureToken, time()+(3600*24*365), '/');
            }

            if (!$error) {
                $_SESSION['userID'] = $userData['ID'];
                $lastLoginAt = SQL::getPDO()->prepare("UPDATE ".Config::read('db_prefix')."users SET lastLoginAt = NOW() WHERE id = ?");
                $lastLoginAt->execute([$userData['ID']]);
                $return['data']['error'] = null;
                $return['data']['success'] = true;
            }


        } else {
            $return['data']['error'] = 'invalidcredentials';
            $return['data']['success'] = false;
        }

        return $return;
    }

    public function userLoginToken($identityToken, $secureToken)
    {
        $return = ['data' => ['error' => [], 'success' => false]];

        $statement = SQL::getPDO()->prepare("SELECT * FROM " . Config::read('db_prefix') . "reloginTokens WHERE identityToken = ?");
        $statement->execute([$identityToken]);
        $fetch = $statement->fetch();

        if ($fetch !== null && $fetch['secureToken'] == sha1($secureToken)) {
            $_SESSION['userID'] = $fetch['userID'];
            $lastLoginAt = SQL::getPDO()->prepare("UPDATE ".Config::read('db_prefix')." users SET lastLoginAt = NOW() WHERE id = ?");
            $lastLoginAt->execute([$fetch['userID']]);
            $return['data']['error'] = null;
            $return['data']['success'] = true;
            return $return;
        }
        $return['data']['error'] = 'nokeymatch';
        $return['data']['success'] = false;
        return $return;
    }

    public function userLogout($session = null)
    {

    }

    public function checkForIPBan($ip, $userID)
    {
        return false;
    }


    public function createUser()
    {

    }

    public function deleteUser()
    {

    }

    public function user($userID)
    {
        return new User();
    }



}