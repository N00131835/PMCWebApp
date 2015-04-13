<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);

$TenantID = $_POST['TenantID'];
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

$gateway->updateTenant($TenantID, $firstname, $lastname, $dob, $gender, $email, $mobilenum, $propertyID, $startlease, $duration);

header('Location: viewTenants.php');