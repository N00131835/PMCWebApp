<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

if (!isset($_GET) || !isset($_GET['TenantID'])) {
    die('Invalid request');
}
$TenantID = $_GET['TenantID'];

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);

$statement = $gateway->getTenantById($TenantID);
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
        
        <!-- Custom JS coding // This is the JS validation for this Form -->
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
        
        <!-- edittenantForm Section -->
        <section id="tenantForms" class="viewtenantForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-4 col-lg-5">
                        <table class="table table-hover">
                            <!-- This is the category fields on the list. -->
                            <tbody>
                            <h2>Viewing a Tenant</h2>
                                <?php
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">FirstName</td>' . '<td>' . $row['FirstName'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">LastName</td>' . '<td>' . $row['LastName'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">DOB</td>' . '<td>' . $row['DOB'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Gender</td>' . '<td>' . $row['Gender'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Email</td>' . '<td>' . $row['Email'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">MobileNum</td>' . '<td>' . $row['MobileNum'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">PropertyID</td>' . '<td>' . $row['PropertyID'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">StartLease</td>' . '<td>' . $row['StartLease'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Duration</td>' . '<td>' . $row['Duration'] . '</td>';
                                    echo '</tr>';
                                ?>
                            </tbody>
                            <!-- This is the get methods of the properties, where the output of the user put in the Tenant form will be shown -->
                        </table>

                        <div class="optlinksBtm" >
                            <a class="editProperty" href="editTenantForm.php?TenantID=<?php echo $row['TenantID']; ?>">
                                Edit this Tenant</a>
                            <a class="delLink deleteTenant" href="deleteTenant.php?TenantID=<?php echo $row['TenantID']; ?>">Delete this Tenant</a>
                        </div> <!-- These are buttons that will link to Edit and/or Delete the Tenant -->
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