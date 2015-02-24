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

$statement = $gateway->getPropertyById($PropertyID);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css"> <!-- CSS coding // This is where all the styling is placed. -->
        <script type="text/javascript" src="js/propertyList.js"></script> <!-- JS coding // This is the JS validation for this Form -->
    </head>
    <body>
        <div class="container">
            <div class="logInOut">
                <?php require 'toolbar.php'; ?>
            </div> <!-- This is the MENU that is located at the top right of the page. -->

            <h1>Property Management Company</h1>

            <?php
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            ?>

            <hr> <!-- horizontal break line -->

            <h3>Edit Property Form</h3>

            <form id="editPropertyForm" name="editPropertyForm" action="editProperty.php" method="POST">
            <input type="hidden" name="PropertyID" value="<?php echo $PropertyID; ?>" /> <!-- This is a hidden tyoe because we don't want the user to see the ID of the Property -->
                <table border="0">
                    <tbody>
                        <tr class="field">
                            <td class="fieldForm">Address1</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="text" name="Address1" value="<?php
                                    if (isset($_POST) && isset($_POST['Address1'])) {
                                        echo $_POST['Address1'];
                                    } 
                                    else echo $row['Address1'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="Address1Error" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['Address1'])) {
                                        echo $errorMessage['Address1'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">Address2</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="text" name="Address2" value="<?php
                                    if (isset($_POST) && isset($_POST['Address2'])) {
                                        echo $_POST['Address2'];
                                    } 
                                    else echo $row['Address2'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="Address2Error" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['Address2'])) {
                                        echo $errorMessage['Address2'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">Town</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="text" name="Town" value="<?php
                                    if (isset($_POST) && isset($_POST['Town'])) {
                                        echo $_POST['Town'];
                                    } 
                                    else echo $row['Town'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="TownError" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['Town'])) {
                                        echo $errorMessage['Town'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">County</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="text" name="County" value="<?php
                                    if (isset($_POST) && isset($_POST['county'])) {
                                        echo $_POST['County'];
                                    } 
                                    else echo $row['County'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="CountyError" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['County'])) {
                                        echo $errorMessage['County'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">Description</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="text" name="Description" value="<?php
                                    if (isset($_POST) && isset($_POST['Description'])) {
                                        echo $_POST['Description'];
                                    } 
                                    else echo $row['Description'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="DescriptionError" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['Description'])) {
                                        echo $errorMessage['Description'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">Rent</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="number" name="Rent" value="<?php
                                    if (isset($_POST) && isset($_POST['Rent'])) {
                                        echo $_POST['Rent'];
                                    }
                                    else echo $row['Rent'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="RentError" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['Rent'])) {
                                        echo $errorMessage['Rent'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">No. of Bedrooms</td>
                            <td>
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <input type="number" name="Bedrooms" value="<?php
                                    if (isset($_POST) && isset($_POST['Bedrooms'])) {
                                        echo $_POST['Bedrooms'];
                                    } 
                                    else echo $row['Bedrooms'];
                                    ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="BedroomsError" class="error">
                                     <?php
                                    if (isset($errorMessage) && isset($errorMessage['Bedrooms'])) {
                                        echo $errorMessage['Bedrooms'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Update Property" name="updateProperty"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="editLinksbot" >
                    <a class="viewProperty" href="viewProperty.php?PropertyID=<?php echo $row['PropertyID']; ?>">
                        View this Property</a>
                    <a class="delLink deleteProperty" href="deleteProperty.php?PropertyID=<?php echo $row['PropertyID']; ?>">Delete this Property</a>
                </div> <!-- These are buttons that will link to View and/or Delete the property -->
            </form>
            <hr class="botline"> <!-- horizontal break line -->
        </div>    
    </body>
</html>

