<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getProperty();

?>
<!-- This is where the ready made Property List is placed. -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css"> <!-- CSS coding // This is where all the styling is placed. -->
        <script type="text/javascript" src="js/propertyList.js"></script> <!-- JS coding // This is the JS validation for this Form -->
    </head>
    
    <body>
        <div class="container">
            <?php require 'toolbar.php'; ?>
            <?php require 'header.php'; ?>
            <?php require 'mainMenu.php'; ?>

            <hr> <!-- horizontal break -->

            <p>Welcome to the Dashboard</p>
        </div>
    </body>
</html>
