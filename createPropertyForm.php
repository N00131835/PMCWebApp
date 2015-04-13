<?php
require_once 'Connection.php';
require_once 'AreaTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php'; //redirects to the index(login) if the user is not logged in

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("AreaName");
    if(!in_array($sortOrder, $columnNames)){
        $sortOrder = 'AreaName';
    }
}
else {
    $sortOrder = 'AreaName';
}

$connection = Connection::getInstance();
$areaGateway = new AreaTableGateway($connection);

$areas = $areaGateway->getArea($sortOrder);
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
        
        <!-- Custom JS coding for the Create Property Form // This is the JS validation for this Form -->
        <script type="text/javascript" src="js/createProperty.js"></script> 
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
        <section id="propertyForms" class="createpropertyForm-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-8">
                        
                        <h2>Create Property Form</h2>
                        
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
                                            <td class="fieldForm"><a href="createPropertyForm.php?sortOrder=AreaName">AreaName</a></td>
                                            <td>
                                                <select class="selectNameOpt" name="area_id">
                                                    <option value="-1">No area</option></a>
                                                    <?php
                                                    $a = $areas->fetch(PDO::FETCH_ASSOC);
                                                    while ($a) {
                                                        echo '<option value="' . $a['AreaID'] . '">' . $a['AreaName'] . '</option>';
                                                        $a = $areas->fetch(PDO::FETCH_ASSOC);
                                                    }
                                                    ?>
                                                </select>
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
                                                <input type="submit" class="createProFormBtn" value="Create Property" name="createProperty"/> <!-- this is a button that if you click will send a request to the DB and it will create the information written on their respective fields -->
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

