<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css">
    </head>
    <body>
        <div class="container">
            <div class="toolbarBtns">
                <?php require 'toolbar.php'; ?>
            </div> <!-- This is the MENU that is located at the top right of the page. -->

            <h1>Property Management Company</h1>

            <hr> <!-- horizontal break -->

            <?php
            if (!isset($username)) {
                $username = '';
            }
            ?>

            <form action="checkLogin.php" method="POST">
                <table border="0">
                    <tbody>
                        <tr class="field">
                            <td class="fieldForm">Username</td>
                            <td>
                                <input type="text"
                                       name="username"
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
                        <tr>
                            <td></td>
                            <td>
                                <input id="loginbtn" type="submit" value="Login" name="login"/>
                                <!-- This button will allow the user to login to the page -->

                                <input type="button"
                                       value="Register"
                                       name="register"
                                       onclick="document.location.href = 'register.php'"/>
                                <!-- This button will redirect to the Register page, which will allow the user to make an account in the database system, which will allow them to login to the page. -->
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input id="fgtPass" type="button" value="Forgot Password" name="forgot"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <hr class="botline"> <!-- horizontal break -->
        </div>
    </body>
</html>