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

$statement = $gateway->getTenantById($TenantID);
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
        
        <!-- Custom JS coding for Editing Tenant // This is the JS validation for this Form -->
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
        <section id="tenantForms" class="edittenantForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-8">
                       <?php
                        if (isset($errorMessage)) {
                            echo '<p>Error: ' . $errorMessage . '</p>';
                        }
                        ?>

                        <h2>Edit Tenant Form</h2>

                        <form id="editTenantForm" name="editTenantForm" action="editTenant.php" method="POST">
                        <input type="hidden" name="TenantID" value="<?php echo $TenantID; ?>" /> <!-- This is a hidden tyoe because we don't want the user to see the ID of the Tenant -->
                            <table border="0">
                                <tbody>
                                    <tr class="field">
                                        <td class="fieldForm">FirstName</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="FirstName" value="<?php
                                                if (isset($_POST) && isset($_POST['FirstName'])) {
                                                    echo $_POST['FirstName'];
                                                } 
                                                else echo $row['FirstName'];
                                                ?>"
                                            <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="FirstNameError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['FirstName'])) {
                                                    echo $errorMessage['FirstName'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">LastName</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="LastName" value="<?php
                                                if (isset($_POST) && isset($_POST['LastName'])) {
                                                    echo $_POST['LastName'];
                                                } 
                                                else echo $row['LastName'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="LastNameError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['LastName'])) {
                                                    echo $errorMessage['LastName'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">DOB</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="date" name="DOB" value="<?php
                                                if (isset($_POST) && isset($_POST['DOB'])) {
                                                    echo $_POST['DOB'];
                                                } 
                                                else echo $row['DOB'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="DOBError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['DOB'])) {
                                                    echo $errorMessage['DOB'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">Gender</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="Gender" value="<?php
                                                if (isset($_POST) && isset($_POST['Gender'])) {
                                                    echo $_POST['Gender'];
                                                } 
                                                else echo $row['Gender'];
                                                ?>"
                                                <!-- The span if statment sends an error to thepage if the user puts a wrong value in the field -->
                                            <span id="GenderError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['Gender'])) {
                                                    echo $errorMessage['Gender'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">Email</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="Email" value="<?php
                                                if (isset($_POST) && isset($_POST['Email'])) {
                                                    echo $_POST['Email'];
                                                } 
                                                else echo $row['Email'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="EmailError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['Email'])) {
                                                    echo $errorMessage['Email'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">MobileNum</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="number" name="MobileNum" value="<?php
                                                if (isset($_POST) && isset($_POST['MobileNum'])) {
                                                    echo $_POST['MobileNum'];
                                                } 
                                                else echo $row['MobileNum'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="MobileNumError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['MobileNum'])) {
                                                    echo $errorMessage['MobileNum'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">PropertyID</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="number" name="PropertyID" value="<?php
                                                if (isset($_POST) && isset($_POST['PropertyID'])) {
                                                    echo $_POST['PropertyID'];
                                                } 
                                                else echo $row['PropertyID'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="PropertyIDError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['PropertyID'])) {
                                                    echo $errorMessage['PropertyID'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">StartLease</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="date" name="StartLease" value="<?php
                                                if (isset($_POST) && isset($_POST['StartLease'])) {
                                                    echo $_POST['StartLease'];
                                                } 
                                                else echo $row['StartLease'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="StartLeaseError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['StartLease'])) {
                                                    echo $errorMessage['StartLease'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="field">
                                        <td class="fieldForm">Duration</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="number" name="Duration" value="<?php
                                                if (isset($_POST) && isset($_POST['Duration'])) {
                                                    echo $_POST['Duration'];
                                                } 
                                                else echo $row['Duration'];
                                                ?>"
                                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                            <span id="DurationError" class="error">
                                                 <?php
                                                if (isset($errorMessage) && isset($errorMessage['Duration'])) {
                                                    echo $errorMessage['Duration'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" class="createProFormBtn" value="Update Tenant" name="updateTenant"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="editLinksbotArea" >
                                <a class="viewProperty" href="viewTenant.php?TenantID=<?php echo $row['TenantID']; ?>">
                                    View this Tenant</a>
                                <a class="delLink deleteTenant" href="deleteTenant.php?TenantID=<?php echo $row['TenantID']; ?>">Delete this Tenant</a>
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

