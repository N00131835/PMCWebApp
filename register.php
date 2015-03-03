<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css"> <!-- CSS coding // This is where all the styling is placed. -->
        <script type="text/javascript" src="js/register.js"></script> <!-- JS coding // This is the JS validation for this Form -->
    </head>
    <body>
        <div class="container">
                <?php require 'toolbar.php'; ?>
            <?php require 'header.php'; ?>

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
    </body>
</html>
