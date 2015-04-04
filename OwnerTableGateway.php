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
    
    public function insertOwner($fnO, $lnO, $a1O, $a2O, $tnO, $ctO, $mnO, $eO) {
        $sqlQuery = "INSERT INTO owner " .
                "(FirstName, LastName, Address1, Address2, Town, County, MobileNum, Email) " .
                "VALUES (:FirstName, :LastName, :Address1, :Address2, :Town, :County, :MobileNum, :Email)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "FirstName" => $fnO,
            "LastName" => $lnO,
            "Address1" => $a1O,
            "Address2" => $a2O,
            "Town" => $tnO,
            "County" => $ctO,
            "MobileNum" => $mnO,
            "Email" => $eO
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
    
    public function updateOwner($OwnerID, $fnO, $lnO, $a1O, $a2O, $tnO, $ctO, $mnO, $eO) {
        $sqlQuery =
                "UPDATE owner SET " .
                "FirstName = :FirstName, " .
                "LastName = :LastName, " .
                "Address1 = :Address1, " .
                "Address2 = :Address2, " .
                "Town = :Town, " .
                "County = :County, " .
                "MobileNum = :MobileNum, " .
                "Email = :Email " .
                "WHERE OwnerID = :OwnerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "OwnerID" => $OwnerID,
            "FirstName" => $fnO,
            "LastName" => $lnO,
            "Address1" => $a1O,
            "Address2" => $a2O,
            "Town" => $tnO,
            "County" => $ctO,
            "MobileNum" => $mnO,
            "Email" => $eO
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}

