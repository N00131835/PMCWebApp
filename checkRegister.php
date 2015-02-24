<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

/* initialising */
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);


/* This is the validation for the Registration using PHP */
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username cannot be empty<br/>';
}// This ensures that the user wouldn't send a blank field
else {
    // execute a query to see if username is in the database
    $statement = $gateway->getUserByUsername($username);
    
    // if the username is in the database then add an error message
    // to the errorMessage array
    if ($statement->rowCount() !== 0) {
        $errorMessage['username'] = 'Username already registered<br/>';
    }
}// This ensures that the user wouldn't be able to use a registered account

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password cannot be empty<br/>';
}
if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = 'Confirm Password cannot be empty<br/>';
}// These ensures that the user wouldn't send a blank field
else if ($password !== $password2) {
    $errorMessage['password2'] = 'Both Passwords must match<br/>';
}// This ensures that the user wouldn't be able to login if both passwords are different

if (empty($errorMessage)) {
    $gateway->insertUser($username, $password);
    $_SESSION['username'] = $username;
    header('Location: home.php');
}
else {
    require 'register.php';
}
?>










