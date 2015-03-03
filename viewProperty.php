<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

if (!isset($_GET) || !isset($_GET['PropertyID'])) {
    die('Invalid request');
}
$PropertyID = $_GET['PropertyID'];

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getPropertyById($PropertyID);
?>

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

            <hr> <!-- horizontal break -->
                <table>
                    <!-- This is the category fields on the list. -->
                    <tbody>
                    <h3>Viewing a Property</h3>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                            echo '<tr>';
                            echo '<td class="vedHeaders">Address1</td>' . '<td>' . $row['Address1'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">Address2</td>' . '<td>' . $row['Address2'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">Town</td>' . '<td>' . $row['Town'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">County</td>' . '<td>' . $row['County'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">Description</td>' . '<td>' . $row['Description'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">Rent</td>' . '<td>' . $row['Rent'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">Bedrooms</td>' . '<td>' . $row['Bedrooms'] . '</td>';
                            echo '</tr>';
                        ?>
                    </tbody>
                    <!-- This is the get methods of the properties, where the output of the user put in the Property form will be shown -->
                </table>
            
                <div class="optlinksBtm" >
                    <a class="editProperty" href="editPropertyForm.php?PropertyID=<?php echo $row['PropertyID']; ?>">
                        Edit this Property</a>
                    <a class="delLink deleteProperty" href="deleteProperty.php?PropertyID=<?php echo $row['PropertyID']; ?>">Delete this Property</a>
                </div> <!-- These are buttons that will link to Edit and/or Delete the property -->
            <hr class="botlineView"> <!-- horizontal break --> 
        </div>
    </body>
</html>