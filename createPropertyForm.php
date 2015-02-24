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
        <meta charset="UTF-8">
        <title>Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css"> <!-- CSS coding // This is where all the styling is placed. -->
        <script type="text/javascript" src="js/createProperty.js"></script> <!-- JS coding // This is the JS validation for this Form -->
    </head>
    <body>
        <div class="container">
            <div class="logInOut">
                <?php require 'toolbar.php'; ?>
            </div> <!-- This is the MENU that is located at the top right of the page. -->

            <h1>Property Management Company</h1>

            <hr> <!-- horizontal break line -->

            <h3>Create Property Form</h3>
                <form action="createProperty.php" 
                      method="POST"
                      onsubmit="return validateCreateProperty(this);">
                    <table border="0">
                        <tbody>
                            <tr class="field">
                                <td class="fieldForm">Address1</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="text" name="address1" value="<?php
                                        if (isset($_POST) && isset($_POST['address1'])) {
                                            echo $_POST['address1'];
                                        } ?>"
                                    <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                    <span id="address1Error" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['address1'])) {
                                            echo $errorMessage['address1'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="field">
                                <td class="fieldForm">Address2</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="text" name="address2" value="<?php
                                        if (isset($_POST) && isset($_POST['address2'])) {
                                            echo $_POST['address2'];
                                        } ?>"
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                    <span id="address2Error" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['address2'])) {
                                            echo $errorMessage['address2'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="field">
                                <td class="fieldForm">Town</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="text" name="town" value="<?php
                                        if (isset($_POST) && isset($_POST['town'])) {
                                            echo $_POST['town'];
                                        } ?>"
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                    <span id="townError" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['town'])) {
                                            echo $errorMessage['town'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="field">
                                <td class="fieldForm">County</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="text" name="county" value="<?php
                                        if (isset($_POST) && isset($_POST['county'])) {
                                            echo $_POST['county'];
                                        } ?>"
                                        <!-- The span if statment sends an error to thepage if the user puts a wrong value in the field -->
                                    <span id="countyError" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['county'])) {
                                            echo $errorMessage['county'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="field">
                                <td class="fieldForm">Description</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="text" name="description" value="<?php
                                        if (isset($_POST) && isset($_POST['description'])) {
                                            echo $_POST['description'];
                                        } ?>"
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                    <span id="descriptionError" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['description'])) {
                                            echo $errorMessage['description'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="field">
                                <td class="fieldForm">Rent</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="number" name="rent" value="<?php
                                        if (isset($_POST) && isset($_POST['rent'])) {
                                            echo $_POST['rent'];
                                        }?>"
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                    <span id="rentError" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['rent'])) {
                                            echo $errorMessage['rent'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="field">
                                <td class="fieldForm">No. of Bedrooms</td>
                                <td>
                                    <!-- The if statement on the input value makes it remember the data that the user typed in the field. -->
                                    <input type="number" name="bedrooms" value="<?php
                                        if (isset($_POST) && isset($_POST['bedrooms'])) {
                                            echo $_POST['bedrooms'];
                                        } ?>"
                                        <!-- The span if statement sends an error to the page if the user puts a wrong value in the field -->
                                    <span id="bedroomsError" class="error">
                                         <?php
                                        if (isset($errorMessage) && isset($errorMessage['bedrooms'])) {
                                            echo $errorMessage['bedrooms'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Create Property" name="createProperty"/> <!-- this is a button that if you click will send a request to the DB and it will create the information written on their respective fields -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <hr class="botline"> <!-- horizontal break line -->
        </div>    
    </body>
</html>

