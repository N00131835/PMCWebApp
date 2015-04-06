<?php
require_once 'Connection.php';
require_once 'AreaTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

$connection = Connection::getInstance();
$gateway = new AreaTableGateway($connection);

$AreaID = $_POST['AreaID'];
$areaname= $_POST['AreaName'];
$facilities= $_POST['Facilities'];

$gateway->updateArea($AreaID, $areaname, $facilities);

header('Location: viewAreas.php');






