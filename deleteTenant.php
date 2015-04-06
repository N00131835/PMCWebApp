<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

if (!isset($_GET) || !isset($_GET['TenantID'])) {
    die('Invalid request');
}
$TenantID = $_GET['TenantID'];

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);

$gateway->deleteTenant($TenantID);

header("Location: viewTenants.php");
?>