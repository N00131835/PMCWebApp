<?php
require_once 'Connection.php';
require_once 'OwnerTableGateway.php';
//this imports the info needed for this page.

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

if (!isset($_GET) || !isset($_GET['OwnerID'])) {
    die('Invalid request');
}
$OwnerID = $_GET['OwnerID'];

$connection = Connection::getInstance();
$gateway = new OwnerTableGateway($connection);

$statement = $gateway->getOwnerById($OwnerID);
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
        
        <!-- ownerForms Section -->
        <section id="ownerForms" class="viewownerForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-4 col-lg-5">
                        <table class="table table-hover">
                            <!-- This is the category fields on the list. -->
                            <tbody>
                            <h2>Viewing an Owner</h2>
                                <?php
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">FirstName</td>' . '<td class="vedOutput">' . $row['FirstName'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">LastName</td>' . '<td class="vedOutput">' . $row['LastName'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Address1</td>' . '<td class="vedOutput">' . $row['Address1'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Address2</td>' . '<td class="vedOutput">' . $row['Address2'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Town</td>' . '<td class="vedOutput">' . $row['Town'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">County</td>' . '<td class="vedOutput">' . $row['County'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">MobileNum</td>' . '<td class="vedOutput">' . $row['MobileNum'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Email</td>' . '<td class="vedOutput">' . $row['Email'] . '</td>';
                                    echo '</tr>';
                                ?>
                            </tbody>
                            <!-- This is the get methods of the properties, where the output of the user put in the Owner form will be shown -->
                        </table>

                        <div class="optlinksBtm" >
                            <a class="editProperty" href="editOwnerForm.php?OwnerID=<?php echo $row['OwnerID']; ?>">
                                Edit this Owner</a>
                            <a class="delLink deleteOwner" href="deleteOwner.php?OwnerID=<?php echo $row['OwnerID']; ?>">Delete this Owner</a>
                        </div> <!-- These are buttons that will link to Edit and/or Delete the Owner -->
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