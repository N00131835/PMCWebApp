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
        
        <!-- Custom JS coding for the Register Page// This is the JS validation for this Form -->
        <script type="text/javascript" src="js/register.js"></script>
    </head>
    <body>
        <!-- Header Navigation is in a separate page, so that when I want to edit something i can just go in to the header.php page 
            and make my edits there, instead of having to edit it in a lot of pages.  -->
        <?php require 'header.php'; ?>
        
        <div class="custom-container container">

            <hr> <!-- horizontal break -->

            <form id="registerForm" 
                  action="checkRegister.php" 
                  method="POST" 
                  onsubmit="return validateRegistration(this);">
                <table border="0">
                    <tbody>
                        <tr class="field">
                            <td class="fieldForm">Username</td>
                            <td>
                                <input type="text" name="username" value="<?php
                                    if (isset($_POST) && isset($_POST['username'])) {
                                        echo $_POST['username'];
                                    } ?>"
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="usernameError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['username'])) {
                                        echo $errorMessage['username'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">Password</td>
                            <td>
                                <input type="password" name="password" value=""
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="passwordError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password'])) {
                                        echo $errorMessage['password'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="field">
                            <td class="fieldForm">Confirm Password</td>
                            <td>
                                <input type="password" name="password2" value=""
                                <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                <span id="password2Error" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                        echo $errorMessage['password2'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Register" name="register"/>
                                <!-- By clicking this sumbit button, it will go through the database and the next time the user login with the username and password that they entered, they will be able to log in. -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <hr class="botline"> <!-- horizontal break -->
        </div>
        
        <!-- Footer Section -->
        <?php require 'footer.php'; ?>
    
        <!-- JAVASCRIPT just before the closing of the body tag --> <!-- Why its at the bottom? SPEED and so that the body, content loads faster. -->
        <script type="text/javascript" src="js/jquery.js"></script> <!-- jquery is a library, javascript framework, it has a lot of things 
        // using thwe CDN(content delivery network) for speed and efficiency for the end users -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- This is the Bootstrap script -->
    </body>
</html>
