<?php

class PropertyTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getProperty() {
        // execute a query to get all property
        $sqlQuery = "SELECT * FROM property";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve property");
        }
        
        return $statement;
    }
    
    public function getPropertyById($PropertyID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM property WHERE PropertyID = :PropertyID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "PropertyID" => $PropertyID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve property");
        }
        
        return $statement;
    }
    
    public function insertProperty($a1, $a2, $tn, $ct, $d, $r, $b) {
        $sqlQuery = "INSERT INTO property " .
                "(Address1, Address2, Town, County, Description, Rent, Bedrooms) " .
                "VALUES (:Address1, :Address2, :Town, :County, :Description, :Rent, :Bedrooms)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Address1" => $a1,
            "Address2" => $a2,
            "Town" => $tn,
            "County" => $ct,
            "Description" => $d,
            "Rent" => $r,
            "Bedrooms" => $b
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert property");
        }
        
        $PropertyID = $this->connection->lastInsertId();
        
        return $PropertyID;
    }
    
    public function deleteProperty($PropertyID){ //returns true or false if property has been deleted
        $sqlQuery = "DELETE FROM property WHERE PropertyID = :PropertyID"; // the query code that will delete a row, in this case i used the PropertyID to be selected.
               
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "PropertyID" => $PropertyID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete property");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateProperty($PropertyID, $a1, $a2, $tn, $ct, $d, $r, $b) {
        $sqlQuery =
                "UPDATE property SET " .
                "Address1 = :Address1, " .
                "Address2 = :Address2, " .
                "Town = :Town, " .
                "County = :County, " .
                "Description = :Description, " .
                "Rent = :Rent, " .
                "Bedrooms = :Bedrooms " .
                "WHERE PropertyID = :PropertyID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "PropertyID" => $PropertyID,
            "Address1" => $a1,
            "Address2" => $a2,
            "Town" => $tn,
            "County" => $ct,
            "Description" => $d,
            "Rent" => $r,
            "Bedrooms" => $b
        );

        echo '<pre>';
        print_r($params); print_r($statement);
        echo '</pre>';
        
        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}

