<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in
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
        
        <!-- Custom JS coding for the Create Owner Form // This is the JS validation for this Form -->
        <script type="text/javascript" src="js/createOwner.js"></script> 
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
        <section id="propertyForms" class="createownerForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h3>Create Owner Form</h3>
                        <form action="createOwner.php" 
                              method="POST"
                              onsubmit="return validateCreateOwner(this);">
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
                                        <td class="fieldForm">Address1</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="Address1" value="<?php
                                                if (isset($_POST) && isset($_POST['Address1'])) {
                                                    echo $_POST['Address1'];
                                                }
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
                                        <td class="fieldForm">MobileNum</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="number" name="MobileNum" value="<?php
                                                if (isset($_POST) && isset($_POST['MobileNum'])) {
                                                    echo $_POST['MobileNum'];
                                                }
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
                                        <td class="fieldForm">Email</td>
                                        <td>
                                            <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                            <input type="text" name="Email" value="<?php
                                                if (isset($_POST) && isset($_POST['Email'])) {
                                                    echo $_POST['Email'];
                                                }
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
                                    
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" value="Create Owner" name="createOwner"/> <!-- this is a button that if you click will send a request to the DB and it will create the information written on their respective fields -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

