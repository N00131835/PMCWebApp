<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getProperty();
?>
<!-- This is where the ready made Property List is placed. -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/pmcStyle.css"> <!-- CSS coding // This is where all the styling is placed. -->
    </head>
    
    <body>
        <div class="container">
            <div class="logInOut">
                <?php require 'toolbar.php'; ?>
            </div> <!-- This is the MENU that is located at the top right of the page. -->

            <h1>Property Management Company</h1>

            <hr> <!-- horizontal break -->

            <h3>Property List</h3>
                <table>
                    <thead>
                        <tr>
                            <th class="listPr">Address1</th>
                            <th class="listPr">Address2</th>
                            <th class="listPr">Town</th>
                            <th class="listPr">County</th>
                            <th class="listPr">Description</th>
                            <th class="listPr">Rent / Monthly</th>
                            <th class="listPr">No. of bedrooms</th>
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
                            echo '<td class="prEach1">' . $row['Town'] . '</td>';
                            echo '<td class="prEach1">' . $row['County'] . '</td>';
                            echo '<td class="prEach2">' . $row['Description'] . '</td>';
                            echo '<td class="prEach3">' . $row['Rent'] . '</td>';
                            echo '<td class="prEach4">' . $row['Bedrooms'] . '</td>';
                            echo '</tr>';

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                    <!-- This is the get methods of the properties, where the output of the user put in the Property form will be shown -->
                </table>
            <hr class="botline"> <!-- horizontal break -->
        </div>
    </body>
</html>
