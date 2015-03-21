<?php
require_once 'Connection.php';
require_once 'OwnerTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

if (!isset($_GET) || !isset($_GET['OwnerID'])) {
    die('Invalid request');
}
$OwnerID = $_GET['OwnerID'];

$connection = Connection::getInstance();
$gateway = new OwnerTableGateway($connection);

$gateway->deleteOwner($OwnerID);

header("Location: viewOwners.php");
?>
