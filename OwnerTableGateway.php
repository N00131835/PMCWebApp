<?php

class OwnerTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getOwner() {
        // execute a query to get all Owner
        $sqlQuery = "SELECT * FROM owner";
        
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve Owner");
        }
        
        return $statement;
    }
    
    public function getOwnerById($OwnerID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM owner WHERE OwnerID = :OwnerID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "OwnerID" => $OwnerID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve Owner");
        }
        
        return $statement;
    }
    
    public function insertOwner($a1, $a2, $tn, $ct, $d, $r, $b) {
        $sqlQuery = "INSERT INTO owner " .
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
            die("Could not insert Owner");
        }
        
        $OwnerID = $this->connection->lastInsertId();
        
        return $OwnerID;
    }
    
    public function deleteOwner($OwnerID){ //returns true or false if Owner has been deleted
        $sqlQuery = "DELETE FROM owner WHERE OwnerID = :OwnerID"; // the query code that will delete a row, in this case i used the OwnerID to be selected.
               
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "OwnerID" => $OwnerID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete Owner");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateOwner($OwnerID, $a1, $a2, $tn, $ct, $d, $r, $b) {
        $sqlQuery =
                "UPDATE owner SET " .
                "Address1 = :Address1, " .
                "Address2 = :Address2, " .
                "Town = :Town, " .
                "County = :County, " .
                "Description = :Description, " .
                "Rent = :Rent, " .
                "Bedrooms = :Bedrooms " .
                "WHERE OwnerID = :OwnerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "OwnerID" => $OwnerID,
            "Address1" => $a1,
            "Address2" => $a2,
            "Town" => $tn,
            "County" => $ct,
            "Description" => $d,
            "Rent" => $r,
            "Bedrooms" => $b
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}

