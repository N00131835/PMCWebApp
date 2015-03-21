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

$OwnerID = $_POST['OwnerID'];
$firstname= $_POST['FirstName'];
$lastname= $_POST['LastName'];
$address1 = $_POST['Address1'];
$address2 = $_POST['Address2'];
$town = $_POST['Town'];
$county= $_POST['County'];
$mobilenum = $_POST['MobileNum'];
$email = $_POST['Email'];

$gateway->updateOwner($OwnerID, $firstname, $lastname, $address1, $address2, $town, $county, $mobilenum, $email);

header('Location: viewOwners.php');






