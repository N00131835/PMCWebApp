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
        <!-- meta tags  -->
        <meta charset="utf-8"> <!-- This is so the browers can read and display characters -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This means that the browser will (probably) render the width of the page at the width of its own screen.
        http://css-tricks.com/snippets/html/responsive-meta-tag/ -->
        
        <!-- Favicon and Title of the Site -->
        <link rel="icon" href="img/dr-icon.png">
        <title> Dublin Rentals </title> <!--  -->

        <!-- Bootstrap CSS and JS -->
        <script type="text/javascript" src="js/respond.js"></script> <!-- This is what we downloaded from github, we need to hav this is the head, the page wont load or do the responsive thing without this.  -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!--This the bootstrap framework stylesheet. CSS that is used for mobiles, so that its faster to load. -->
        
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/customBS3Style.css"> 
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css">
        
        <!-- Custom font -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
        <!-- Custom JS coding for Editing Property // This is the JS validation for this Form -->
        <script type="text/javascript" src="js/propertyList.js"></script> 
    </head>
    <body id="back-to-top">
        <!-- Header Navigation is in a separate page, so that when I want to edit something i can just go in to the header.php page 
            and make my edits there, instead of having to edit it in a lot of pages.  -->
        <?php require 'header.php'; ?>
        
        <!-- menuList Section -->
        <section id="mainMenuList" class="menuList-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                           <?php require 'mainMenu.php'; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- editpropertyForm Section -->
        <section id="propertyForms" class="editpropertyForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-8">
                       <?php
                        if (isset($errorMessage)) {
                            echo '<p>Error: ' . $errorMessage . '</p>';
                        }
                        ?>

                        <h2>Edit Property Form</h2>

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
                                            <input type="submit" class="createProFormBtn" value="Update Property" name="updateProperty"/>
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
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer Section -->
        <?php require 'footer.php'; ?>
    
        <!-- JAVASCRIPT just before the closing of the body tag --> <!-- Why its at the bottom? SPEED and so that the body, content loads faster. -->
        <script type="text/javascript" src="js/jquery.js"></script> <!-- jquery is a library, javascript framework, it has a lot of things 
        // using thwe CDN(content delivery network) for speed and efficiency for the end users -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- This is the Bootstrap script -->
    </body>
</html>

