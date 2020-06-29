<?php


namespace Klefiu\App\Auth;


use Klefiu\App;
use Klefiu\App\Config;

class User extends App
{

    private $userID;

    public function __construct($userID)
    {
        $this->userID = $userID;
    }

    private function fetchData($type) {
        $statement = parent::sql()->getPDO()->prepare("SELECT * FROM " . Config::read('db_prefix') . "users WHERE ID = ?");
        $result = $statement->execute([$this->userID]);
        return $statement->fetch()[$type];
    }

    public function setData($type, $value)
    {
        $statement = parent::sql()->getPDO()->prepare("UPDATE " . Config::read('db_prefix') . "users SET " . $type . " = :value WHERE ID = :uID");
        return $statement->execute(['value' => $value, 'uID' => $this->userID]);
    }

    public function getLanguageCode()
    {
        return $this->fetchData('langCode');
    }

    public function getPrename()
    {
        return $this->fetchData('prename');
    }
    public function getUserID()
    {
        return $this->userID;
    }

    public function getLastname()
    {
        return $this->fetchData('lastname');
    }

    public function getPasswordHash()
    {
        return $this->fetchData('password');
    }

    public function getUsername()
    {
        return $this->fetchData('username');
    }

    public function getEmail()
    {
        return $this->fetchData('email');
    }

    public function getSalutationChar()
    {
        return $this->fetchData('salutation');
    }

    public function getAddress()
    {
        if (!empty($this->fetchData('street')) && !empty($this->fetchData('zipCode')) && !empty($this->fetchData('houseNumber')) && !empty($this->fetchData('city')) && !empty($this->fetchData('country'))) {
            return $this->fetchData('street') . ' ' . $this->fetchData('houseNumber') . '\n' . $this->fetchData('zipCode') . ' ' . $this->fetchData('city') . '\n' . $this->fetchData('country');
        }
        return false;
    }

    public function getStreet()
    {
        return $this->fetchData('street');
    }

    public function getHouseNumber()
    {
        return $this->fetchData('houseNumber');
    }

    public function getZipCode()
    {
        return $this->fetchData('zipCode');
    }

    public function getCity()
    {
        return $this->fetchData('city');
    }

    public function getCountry()
    {
        return $this->fetchData('country');
    }

    public function getProfilePictureData()
    {
        return unserialize($this->fetchData('profilePic'));
    }

    public function setProfilePictureData($image, $file_extension, $height = null, $width = null)
    {
        $content_types = [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'jpeg' => 'image/jpeg',
            'svg' => 'image/svg+xml',
            'bmp' => 'image/bmp',
            'gif' => 'image/gif'
        ];
        if (array_key_exists($file_extension, $content_types)) {
            return $this->setData('profilePic', serialize(['image' => $image, 'content-type' => $content_types[$file_extension], 'height' => $height, 'width' => $width]));
        }
        return false;
    }

    public function profilePictureIsSet()
    {
        if ($this->getProfilePictureData() !== unserialize(null)) {
            return true;
        }
        return false;
    }


    public function createEmailValidation($email, $mode = 'old')
    {
        $emailCode = parent::utils()->getRandomString();
        parent::sql()->getPDO()->prepare("DELETE FROM " . Config::read('db_prefix') . "emailValidation WHERE userID = ?")->execute([$this->userID]);
        $statement = parent::sql()->getPDO()->prepare("INSERT INTO " . Config::read('db_prefix') . "emailValidation (userID, mode, emailCode, emailOld, emailNew) VALUES (:uID, :mode, :emailCode, :emailOld, :emailNew)");
        $result = $statement->execute(['uID' => $this->userID, 'mode' => $mode, 'emailCode' => sha1($emailCode), 'emailOld' => $this->getEmail(), 'emailNew' => $email]);
        return [
            'data' => [
                'success' => ($result == true),
                'emailCode' => $emailCode
            ]
        ];
    }

    public function createPasswordCode()
    {
        $pwCode = parent::utils()->getRandomString();
        $this->setData('pwCode', sha1($pwCode));
        $this->setData('pwCode_time', date('Y-m-d H:i:s'));
        return $pwCode;
    }

    public function updateProfile($data = [])
    {
        if (array_key_exists('password', $data)) {
            return false;
        }

        $userIDArray = ['uID' => $this->userID];
        $executeArray = array_merge($data, $userIDArray);

        $statement = parent::sql()->getPDO()->prepare("UPDATE " . Config::read('db_prefix') . "users SET salutation = :salutation, prename = :prename, lastname = :lastname, street = :street, zipCode = :zipCode, houseNumber = :houseNumber, city = :city, country = :country, updatedAt = NOW() WHERE ID = :uID");
        return $statement->execute($executeArray);
    }

    public function setPassword($pass)
    {
        return $this->setData('password', password_hash($pass, PASSWORD_DEFAULT));
    }


    public function deletePasswordCode()
    {
        $this->setData('pwCode', null);
        $this->setData('pwCode_time', null);
    }

    public function getCreationDate($format = 'd.m.Y')
    {
        return date($format, strtotime($this->fetchData('createdAt')));
    }

    public function getPasswordCode()
    {
        return $this->fetchData('pwCode');
    }

    public function getPasswordCodeTime()
    {
        return $this->fetchData('pwCode_time');
    }

    public function getUpdateTime()
    {
        return $this->fetchData('updatedAt');
    }

    public function getUsedBytes()
    {
        return $this->fetchData('usedDiskSpace');
    }

    public function getTotalBytes()
    {
        return $this->fetchData('totalDiskSpace');
    }

    public function getUploadedFiles()
    {
        return $this->fetchData('uploadedFiles');
    }

    public function getTotalDownloads()
    {
        return $this->fetchData('totalDownloads');
    }


    public function calculateDiskUsage()
    {
        return round(($this->fetchData('usedDiskSpace')*100)/$this->fetchData('totalDiskSpace'));
    }

}