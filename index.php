<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

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
    </head>
    
    <body>
        <div class="container">
            <?php require 'toolbar.php'; ?>

            <?php require 'header.php'; ?>
            <?php require 'mainMenu.php'; ?>

            <p>Welcome to the Property Management Company</p>
            
            <hr class="botline"> <!-- horizontal break -->
        </div>
    </body>
</html>
