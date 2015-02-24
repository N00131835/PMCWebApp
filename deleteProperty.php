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

if (!isset($_GET) || !isset($_GET['PropertyID'])) {
    die('Invalid request');
}
$PropertyID = $_GET['PropertyID'];

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$gateway->deleteProperty($PropertyID);

header("Location: home.php");
?>