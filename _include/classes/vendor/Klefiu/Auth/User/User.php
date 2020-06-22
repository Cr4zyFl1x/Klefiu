<?php


namespace Klefiu\App\Auth;


class User
{

    private $userID;

    public function __construct($userID)
    {
        $this->userID = $userID;
    }

}