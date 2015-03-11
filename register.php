<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> <!-- This is so the browers can read and display characters -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This means that the browser will (probably) render the width of the page at the width of its own screen.
        http://css-tricks.com/snippets/html/responsive-meta-tag/ -->
    <link rel="icon" href="img/dr-icon.png">
        <title> Dublin Rentals </title> <!--  -->

        <script type="text/javascript" src="js/respond.js"></script> <!-- This is what we downloaded from github, we need to hav this is the head, the page wont load or do the responsive thing without this.  -->

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!--This the bootstrap framework stylesheet. CSS that is used for mobiles, so that its faster to load. -->

    <link rel="stylesheet" type="text/css" href="css/customBS3Style.css"> <!-- custom CSS -->

    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'> <!-- custom font -->
    </head>
    
    <body id="back-to-top">
    <!-- Header Navigation is in a separate page, so that when I want to edit something i can just go in to the header.php page 
         and make my edits there, instead of having to edit it in a lot of pages.  -->
    <?php require 'header.php'; ?>

    <!-- Search Box Section -->
    <section id="regPage" class="register-section">
      <div class="loginReg-container">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-sm-7 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4 ">

                    <form id="registerForm" 
                          action="checkRegister.php" 
                          method="POST" 
                          onsubmit="return validateRegistration(this);">
                        <div class="form-register">
                            <h4>Register to Dublin Rentals</h4>
                            <input type="text"
                                       name="username"
                                       class="form-control input-sm chat-input" 
                                       placeholder="username"
                                       value="<?php
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

                            <br/>

                            <input type="password" 
                                        name="password" 
                                        class="form-control input-sm chat-input" 
                                        placeholder="password" 
                                        value="" />

                                        <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                        <span id="passwordError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                echo $errorMessage['password'];
                                            }
                                            ?>
                                        </span> 
                            <br/>
                            
                            <input type="password" 
                                        name="password2" 
                                        class="form-control input-sm chat-input" 
                                        placeholder="confirm password" 
                                        value="" />

                                        <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                        <span id="password2Error" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                                echo $errorMessage['password2'];
                                            }
                                            ?>
                                        </span> 
                            <br/>

                            <div class="wrapper">     
                                    <input class="regBtn btn btn-primary btn-default" type="submit" value="Register" name="register"/>
                                     <!-- By clicking this sumbit button, it will go through the database and the next time the user login with the username and password that they entered, they will be able to log in. -->
                            </div>
                        </div>
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