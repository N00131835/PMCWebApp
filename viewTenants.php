<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);

$statement = $gateway->getTenant();

?>
<!-- This is where the ready made Tenant List is placed. -->
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
        
        <!-- menuList Section -->
        <section id="tenantLists" class="tenantList-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h3>
                            Tenant List
                            
                            <a href="createPropertyForm.php" class="pull-right">
                                <input id="createPro" type="submit" value="Create Property" name="createProperty"/>
                            </a>
                        </h3>

                        <table>
                            <thead>
                                <tr>
                                    <th class="listPr">FirstName</th>
                                    <th class="listPr">LastName</th>
                                    <th class="listPr">DOB</th>
                                    <th class="listPr">Gender</th>
                                    <th class="listPr">Email</th>
                                    <th class="listPr">MobileNum</th>
                                    <th class="listPr">PropertyID</th>
                                    <th class="listPr">StartLease</th>
                                    <th class="listPr">Duration</th>
                                    <th class="listPr">Options</th>
                                </tr>
                            </thead>
                            <!-- This is the category fields on the list. -->
                            <tbody>
                                <?php
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                while ($row)  {
                                    echo '<tr>';
                                    echo '<td class="prEach1">' . $row['FirstName'] . '</td>';
                                    echo '<td class="prEach3">' . $row['LastName'] . '</td>';
                                    echo '<td class="prEach1">' . $row['DOB'] . '</td>';
                                    echo '<td class="prEach1">' . $row['Gender'] . '</td>';
                                    echo '<td class="prEach3">' . $row['Email'] . '</td>';
                                    echo '<td class="prEach3">' . $row['MobileNum'] . '</td>';
                                    echo '<td class="prEach3">' . $row['PropertyID'] . '</td>';
                                    echo '<td class="prEach4">' . $row['StartLease'] . '</td>';
                                    echo '<td class="prEach4">' . $row['Duration'] . '</td>';
                                    echo '<td class="prEach4 optlinks">'
                                    . '<a href="viewTenant.php?TenantID='.$row['TenantID'].'">View</a> '
                                    . '<a href="editTenantForm.php?TenantID='.$row['TenantID'].'">Edit</a> '
                                    . '<a class="deleteTenant" href="deleteTenant.php?TenantID='.$row['TenantID'].'">Delete</a> '
                                    . '</td>';
                                    echo '</tr>';

                                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </tbody>
                            <!-- This is the get methods of the properties, where the output of the user put in the Tenant form will be shown -->
                        </table>
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
