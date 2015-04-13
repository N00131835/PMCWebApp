<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);


//initialising
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$dob = $_POST['DOB'];
$gender = $_POST['Gender'];
$email = $_POST['Email'];
$mobilenum = $_POST['MobileNum'];
$propertyID = $_POST['PropertyID'];
if ($propertyID == -1) {
    $propertyID = NULL;
}
$startlease = $_POST['StartLease'];
$duration = $_POST['Duration'];

// validating the data using PHP
// This validation ensures that the user wouldn't send a blank form
$errorMessage = array();
if ($firstname === FALSE || $firstname === '') {
    $errorMessage['FirstName'] = 'FirstName cannot be empty<br/>';
}

if ($lastname === FALSE || $lastname === '') {
    $errorMessage['LastName'] = 'LastName cannot be empty<br/>';
}

if ($dob === FALSE || $dob === '') {
    $errorMessage['DOB'] = 'DOB cannot be empty<br/>';
}

if ($gender === FALSE || $gender === '') {
    $errorMessage['Gender'] = 'Gender cannot be empty<br/>';
}

if ($email === FALSE || $email === '') {
    $errorMessage['Email'] = 'Email cannot be empty<br/>';
}

if ($mobilenum === FALSE || $mobilenum === '') {
    $errorMessage['MobileNum'] = 'MobileNum cannot be empty<br/>';
}

if ($propertyID === FALSE || $propertyID === '') {
    $errorMessage['PropertyID'] = 'PropertyID cannot be empty<br/>';
}

if ($startlease === FALSE || $startlease === '') {
    $errorMessage['StartLease'] = 'StartLease cannot be empty<br/>';
}

if ($duration === FALSE || $duration === '') {
    $errorMessage['Duration'] = 'Duration cannot be empty<br/>';
}

if (empty($errorMessage)) {
    $id = $gateway->insertTenant($firstname, $lastname, $dob, $gender, $email, $mobilenum, $propertyID, $startlease, $duration);
    header('Location: viewTenants.php');
}
else {
    require 'createTenantForm.php';
}