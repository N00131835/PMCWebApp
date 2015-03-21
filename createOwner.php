<?php
require_once 'Connection.php';
require_once 'OwnerTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

$connection = Connection::getInstance();
$gateway = new OwnerTableGateway($connection);

//initialising
$firstname= $_POST['FirstName'];
$lastname= $_POST['LastName'];
$address1 = $_POST['Address1'];
$address2 = $_POST['Address2'];
$town = $_POST['Town'];
$county= $_POST['County'];
$mobilenum = $_POST['MobileNum'];
$email = $_POST['Email'];

// validating the data using PHP
// This validation ensures that the user wouldn't send a blank form
$errorMessage = array();
if ($firstname === FALSE || $firstname === '') {
    $errorMessage['FirstName'] = 'FirstName cannot be empty<br/>';
}

if ($lastname === FALSE || $lastname === '') {
    $errorMessage['LastName'] = 'LastName cannot be empty<br/>';
}

if ($address1 === FALSE || $address1 === '') {
    $errorMessage['Address1'] = 'Address1 cannot be empty<br/>';
}

if ($address2 === FALSE || $address2 === '') {
    $errorMessage['Address2'] = 'Address2 cannot be empty<br/>';
}

if ($town === FALSE || $town === '') {
    $errorMessage['Town'] = 'Town cannot be empty<br/>';
}

if ($county === FALSE || $county === '') {
    $errorMessage['County'] = 'County cannot be empty<br/>';
}

if ($mobilenum === FALSE || $mobilenum === '') {
    $errorMessage['MobileNum'] = 'MobileNum cannot be empty<br/>';
}

if ($email === FALSE || $email === '') {
    $errorMessage['Email'] = 'Email cannot be empty<br/>';
}

if (empty($errorMessage)) {
    $id = $gateway->insertOwner($firstname, $lastname, $address1, $address2, $town, $county, $mobilenum, $email);
    header('Location: viewOwners.php');
}
else {
    require 'createOwnerForm.php';
}






