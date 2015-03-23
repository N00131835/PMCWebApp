<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

require 'ensureUserLoggedIn.php'; 
//redirects to the index(login) if the user is not logged in

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getProperty();

?>
<!-- This is where the ready made Property List is placed. -->
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
        
        <!-- propertyList Section -->
        <section id="propertyLists" class="propertyList-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h3>
                            Property List
                            
                            <a href="createPropertyForm.php" class="createBtnLink pull-right">
                                <span name="createProperty" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </h3>
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="TableCol1">Address1</th>
                                    <th class="TableCol2">Address2</th>
                                    <th class="TableCol3">Town</th>
                                    <th class="TableCol4">AreaName</th>
                                    <th class="TableColOpt">Options</th>
                                </tr>
                            </thead>
                            <!-- This is the category fields on the list. -->
                            <tbody>
                                <?php
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                while ($row)  {
                                    echo '<tr>';
                                    echo '<td class="prEach1">' . $row['Address1'] . '</td>';
                                    echo '<td class="prEach1">' . $row['Address2'] . '</td>';
                                    echo '<td class="prEach3">' . $row['Town'] . '</td>';
                                    echo '<td class="prEach3">' . $row['AreaName'] . '</td>';
                                    echo '<td class="prEach4 optlinks">'
                                    . '<a href="viewProperty.php?PropertyID='.$row['PropertyID'].'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a> '
                                    . '<a href="editPropertyForm.php?PropertyID='.$row['PropertyID'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> '
                                    . '<a class="deleteProperty" href="deleteProperty.php?PropertyID='.$row['PropertyID'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> '
                                    . '</td>';
                                    echo '</tr>';

                                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </tbody>
                            <!-- This is the get methods of the properties, where the output of the user put in the Property form will be shown -->
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
