<?php
require_once 'Connection.php';
require_once 'AreaTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index.php page if the user is not logged in

if (!isset($_GET) || !isset($_GET['AreaID'])) {
    die('Invalid request');
}       
$AreaID = $_GET['AreaID'];

$connection = Connection::getInstance();
$gateway = new AreaTableGateway($connection);

$statement = $gateway->getAreaById($AreaID);
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
        
        <!-- Custom JS coding for Editing Area // This is the JS validation for this Form -->
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
        
        <!-- editownerForm Section -->
        <section id="areaForms" class="editareaForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-8">
                        <?php
                        if (isset($errorMessage)) {
                            echo '<p>Error: ' . $errorMessage . '</p>';
                        }
                        ?>

                        <h2>Edit Area Form</h2>

                        <form id="editAreaForm" name="editAreaForm" action="editArea.php" method="POST">
                        <input type="hidden" name="AreaID" value="<?php echo $AreaID; ?>" /> <!-- This is a hidden tyoe because we don't want the user to see the ID of the Area -->
                            <table border="0">
                                <tbody> 
                                    <tr class="field">
                                        <td class="fieldForm">AreaName</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="AreaName" value="<?php
                                                if (isset($_POST) && isset($_POST['AreaName'])) {
                                                    echo $_POST['AreaName'];
                                                } 
                                                else echo $row['AreaName'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="AreaNameError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['AreaName'])) {
                                                    echo $errorMessage['AreaName'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr class="field">
                                        <td class="fieldForm">Facilities</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="Facilities" value="<?php
                                                if (isset($_POST) && isset($_POST['Facilities'])) {
                                                    echo $_POST['Facilities'];
                                                } 
                                                else echo $row['Facilities'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="FacilitiesError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['Facilities'])) {
                                                    echo $errorMessage['Facilities'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" class="createOwnFormBtn" value="Update Area" name="updateArea"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="editLinksbotArea" >
                                <a class="viewArea" href="viewArea.php?AreaID=<?php echo $row['AreaID']; ?>">
                                    View this Area</a>
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

