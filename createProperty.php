<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);


//initialising
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$town = $_POST['town'];
$county = $_POST['county'];
$areaId = $_POST['areaId'];
if ($areaId == -1) {
    $areaId = NULL;
}
$description = $_POST['description'];
$rent = $_POST['rent'];
$bedrooms = $_POST['bedrooms'];

// validating the data using PHP
// This validation ensures that the user wouldn't send a blank form
$errorMessage = array();
if ($address1 === FALSE || $address1 === '') {
    $errorMessage['address1'] = 'Address1 cannot be empty<br/>';
}

if ($address2 === FALSE || $address2 === '') {
    $errorMessage['address2'] = 'Address2 cannot be empty<br/>';
}

if ($town === FALSE || $town === '') {
    $errorMessage['town'] = 'Town cannot be empty<br/>';
}

if ($county === FALSE || $county === '') {
    $errorMessage['county'] = 'County cannot be empty<br/>';
}

if ($areaId === FALSE || $areaId === '') {
    $errorMessage['areaId'] = 'areaId cannot be empty<br/>';
}

if ($description === FALSE || $description === '') {
    $errorMessage['description'] = 'Description cannot be empty<br/>';
}

if ($rent === FALSE || $rent === '') {
    $errorMessage['rent'] = 'Rent cannot be empty<br/>';
}

if ($bedrooms === FALSE || $bedrooms === '') {
    $errorMessage['bedrooms'] = 'Bedrooms cannot be empty<br/>';
}

if (empty($errorMessage)) {
    $id = $gateway->insertProperty($address1, $address2, $town, $county, $areaId, $description, $rent, $bedrooms);
    header('Location: viewProperties.php');
}
else {
    require 'createPropertyForm.php';
}