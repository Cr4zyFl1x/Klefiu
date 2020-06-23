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

            if ($this->checkLogin()) {
                $error = true;
                $return['data']['error'] = "alreadyloggedin";
                $return['data']['success'] = false;
            }

            if (!$error && $this->checkForIPBan($_SERVER['REMOTE_ADDR'], $userData['ID'])) {
                $error = true;
                $return['data']['error'] = 'ipbanned';
                $return['data']['success'] = false;
            }

            if (!$error) {
                $lastLoginAt = SQL::getPDO()->prepare("UPDATE ".Config::read('db_prefix')."users SET lastLoginAt = NOW() WHERE id = ?");
                $lastLoginAt->execute([$userData['ID']]);
                $session = $this->createSession($userData['ID'], $rememberme);

                $_SESSION['userID'] = $userData['ID'];
                $_SESSION['sessionToken'] = $session['data']['sessionToken'];

                $return['data']['error'] = null;
                $return['data']['success'] = true;
                $return['data']['sessionToken'] = $session['data']['sessionToken'];
            }
        } else {
            $return['data']['error'] = 'invalidcredentials';
            $return['data']['success'] = false;
        }

        return $return;
    }

    public function userLogout()
    {
        $sessionToken = $_COOKIE['KLEFIU_loginSession'];
        if ($this->checkLogin()) {
            setcookie("KLEFIU_loginSession", $sessionToken, time()-(3600*24*365), '/');
            session_destroy();
            $status = $this->deleteSession($sessionToken);
            return [
                'data' => [
                    'success' => $status['data']['success']
                ]
            ];
        }
        return [
            'data' => [
                'success' => false,
                'error' => 'notloggedin'
            ]
        ];
    }



    private function createSession($userID, $rememberme)
    {
        $sessionToken = sha1(rand(5, 50000000));
        $sessionTime = ($rememberme) ? time()+(3600*24*365) : 0;
        $sessionValidity = ($rememberme) ? (3600*24*365) : (3600*2);

        $statement = SQL::getPDO()->prepare("INSERT INTO " . Config::read('db_prefix') . "loginSessions (userID, sessionToken, userAgent, operatingSystem, ipAddress, sessionValidity) VALUES (:uID, :sT, :uA, :oS, :ip, :sV)");
        $result = $statement->execute(['uID' => $userID, 'sT' => sha1($sessionToken), 'uA' => Func::getUserAgent(), 'oS' => Func::getOperatingSystem(), 'ip' => Func::getUserIP(), 'sV' => $sessionValidity]);
        if ($result) {
            setcookie("KLEFIU_loginSession", $sessionToken, $sessionTime, '/');
            return [
                'data' => [
                    'error' => null,
                    'success' => true,
                    'sessionToken' => $sessionToken
                ]
            ];
        }
        return [
            'data' => [
                'error' => 'sessioncreatefailed',
                'success' => false,
            ]
        ];
    }

    public function deleteSession($session)
    {
        if ($this->sessionExists($session)) {
            $statement = SQL::getPDO()->prepare("DELETE FROM " . Config::read('db_prefix') . "loginSessions WHERE sessionToken = ?");
            $result = $statement->execute([sha1($session)]);
            return [
                'data' => [
                    'error' => null,
                    'success' => true
                ]
            ];
        }
        return [
            'data' => [
                'error' => 'sessionnotfound',
                'success' => false
            ]
        ];
    }

    private function sessionExists($session)
    {
        $statement = SQL::getPDO()->prepare("SELECT * FROM " . Config::read('db_prefix') . "loginSessions WHERE sessionToken = ?");
        $result = $statement->execute([sha1($session)]);
        $data = $statement->fetch();
        if ($data == null) return false;
        return true;
    }

    private function getSession($sessionToken)
    {
        $statement = SQL::getPDO()->prepare("SELECT * FROM " . Config::read('db_prefix') . "loginSessions WHERE sessionToken = ?");
        $result = $statement->execute([sha1($sessionToken)]);
        return $statement->fetch();
    }

    private function sessionIsValid($sessionToken)
    {
        if (($this->getSession($sessionToken)['sessionValidity'] + strtotime($this->getSession($sessionToken)['createdAt'])) > time()) {
            return true;
        }
        return false;
    }

    public function getUser()
    {
        if (!$this->checkLogin())
        {
            return [
                'data' => [
                    'success' => false,
                    'error' => 'notloggedin'
                ]
            ];
        }
        return new User($_SESSION['userID']);
    }



    public function checkLogin()
    {
        if (isset($_SESSION['userID']) || $this->sessionIsValid($_COOKIE['KLEFIU_loginSession'])) {
            $userID = $this->getSession($_COOKIE['KLEFIU_loginSession'])['userID'];
            if (!empty($userID)) {
                $_SESSION['userID'] = $userID;
                return true;
            }
        }
        return false;
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