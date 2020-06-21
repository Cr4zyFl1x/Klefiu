<?php

/*
|--------------------------------------------------------------------------
| Load initialization resources
|--------------------------------------------------------------------------
|
| Here we'll import the resources we need to initialize this app.
|
*/

require_once '_storage/static/setup/setupInfo.php';


/*
|--------------------------------------------------------------------------
| Load the setupInfo.php file
|--------------------------------------------------------------------------
|
| Now we will have a look if the setup is actually done.
| If the verification of a successful setup is done we'll load the Site.
| Else we'll start the Setup again.
|
*/

if (!$setup['exited'])  header('Location: ' . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . 'setup.php');


/*
|--------------------------------------------------------------------------
| Initialize the app
|--------------------------------------------------------------------------
|
| At the end we're now able to initialize the WebApp
| This action will initialize the SiteManager, MySQL-Connection, etc.
|
*/

require_once '_include/initialize.php';


