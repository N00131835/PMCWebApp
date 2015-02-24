<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'AreaTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

$connection = Connection::getInstance();
$areaGateway = new AreaTableGateway($connection);

$area = $areaGateway->getArea();
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
            <div class="logInOut">
                <?php require 'toolbar.php'; ?>
            </div> <!-- This is the MENU that is located at the top right of the page. -->

            <h1>Property Management Company</h1>

            <hr> <!-- horizontal break -->
                <table>
                    <!-- This is the category fields on the list. -->
                    <tbody>
                    <h3>Viewing a Property</h3>
                        <?php
                        $row = $area->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td class="vedHeaders">Area Name</td>' . '<td>' . $row['AreaName'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="vedHeaders">Facilities</td>' . '<td>' . $row['Facilities'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                    <!-- This is the get methods of the properties, where the output of the user put in the Property form will be shown -->
                </table>
            
                <!--<div class="optlinksBtm" >
                    <a class="editProperty" href="editPropertyForm.php?PropertyID=<?php echo $row['PropertyID']; ?>">
                        Edit this Property</a>
                    <a class="delLink deleteProperty" href="deleteProperty.php?PropertyID=<?php echo $row['PropertyID']; ?>">Delete this Property</a>
                </div> --> <!-- These are buttons that will link to Edit and/or Delete the property -->
            <hr class="botlineView"> <!-- horizontal break --> 
        </div>
    </body>
</html>