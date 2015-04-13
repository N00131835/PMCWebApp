<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$PropertyID = $_POST['PropertyID'];
$address1 = $_POST['Address1'];
$address2 = $_POST['Address2'];
$town = $_POST['Town'];
$county= $_POST['County'];
$areaId = $_POST['AreaID'];
if ($areaId == -1) {
    $areaId = NULL;
}
$description = $_POST['Description'];
$rent= $_POST['Rent'];
$bedrooms = $_POST['Bedrooms'];

$gateway->updateProperty($PropertyID, $address1, $address2, $town, $county, $areaId, $description, $rent, $bedrooms);

header('Location: viewProperties.php');






