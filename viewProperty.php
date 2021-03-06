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
        
        <!-- propertyForms Section -->
        <section id="propertyForms" class="viewpropertyForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-4 col-lg-5">
                        <table class="table table-hover">
                            <!-- This is the category fields on the list. -->
                            <tbody>
                            <h2>Viewing a Property</h2>
                                <?php
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
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
                                    echo '<td class="vedHeaders">AreaName</td>' . '<td class="vedOutput">' . $row['AreaName'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Description</td>' . '<td class="vedOutput">' . $row['Description'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Rent</td>' . '<td class="vedOutput">' . $row['Rent'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="vedHeaders">Bedrooms</td>' . '<td class="vedOutput">' . $row['Bedrooms'] . '</td>';
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