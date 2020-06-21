<?php
$form = array();
$error = false;
$form['status'] = "";

$form['salutation'] = "m";

if (isset($_GET['check'])) {

    $form['email']          = trim($_POST['email']);
    $form['username']       = trim($_POST['username']);
    $form['salutation']     = trim($_POST['salutation']);
    $form['prename']        = trim($_POST['prename']);
    $form['lastname']       = trim($_POST['lastname']);
    $form['street']         = trim($_POST['street']);
    $form['houseNumber']    = trim($_POST['houseNumber']);
    $form['zipCode']        = trim($_POST['zipCode']);
    $form['city']           = trim($_POST['city']);
    $form['country']        = trim($_POST['country']);
    $form['password']       = $_POST['password'];
    $form['password2']      = $_POST['password2'];

    if (!checkMailSyntax($form['email'])) {
        $error = true;
        $form['status'] = "Allowed characters in email: [a-z, A-Z, 0-9, ., @, -]";
    }

    if (!$error && !checkAZ09Syntax($form['username'])) {
        $error = true;
        $form['status'] = "The username must not contain any special characters!";
    }

    if (!$error && (!checkAZString($form['prename']) || !preg_match("#^[a-zA-Z-]+$#", $form['lastname']) || !checkAZString($form['street']) || !checkAZString($form['city']) || !checkAZString($form['country']))) {
        $error = true;
        $form['status'] = "The prename, lastname, street, city or country must not contain any special characters or digits! (Except [-])";
    }

    if (!is_numeric($form['houseNumber']) || !is_numeric($form['zipCode'])) {
        $error = true;
        $form['status'] = "The zip code and house number must be numeric!";
    }

    if (!$error && $form['password'] !== $form['password2']) {
        $error = true;
        $form['status'] = "The passwords do not match!";
    }

    if (!$error && strlen($form['password']) < 8) {
        $error = true;
        $form['status'] = "The password must be at least eight characters long!";
    }

    if (!$error && checkAZString($form['password'])) {
        $error = true;
        $form['status'] = "The password must contain a number and special character!";
    }

    if (!$error && ($form['zipCode'] < 0 || $form['houseNumber'] < 0)) {
        $error = true;
        $form['status'] = "The zip code and house number must be an positive integer!";
    }


    if (!$error) {
        $statement = $pdo->prepare("INSERT INTO ucms_users (email, username, password, salutation, prename, lastname, street, zipCode, houseNumber, city, country, permGroup) VALUES (:email, :username, :password, :salutation, :prename, :lastname, :street, :zipCode, :houseNumber, :city, :country, :permGroup)");

        $data = array(  'email'         => $form['email'],
                        'username'      => $form['username'],
                        'password'      => password_hash($form['password'], PASSWORD_DEFAULT),
                        'salutation'    => $form['salutation'],
                        'prename'       => $form['prename'],
                        'lastname'      => $form['lastname'],
                        'street'        => $form['street'],
                        'zipCode'       => $form['zipCode'],
                        'houseNumber'   => $form['houseNumber'],
                        'city'          => $form['city'],
                        'country'       => $form['country'],
                        'permGroup'     => 1);

        if (!$statement->execute($data)) {
            $error = true;
            $form['status'] = "An error occoured while writing into the database! Email is already in use!";
        } else {
            header('Location: setup.php?updatePath=/setup/finished');
        }





    }
}