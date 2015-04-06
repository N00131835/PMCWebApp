<?php

class AreaTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getArea() {
        // execute a query to get all property
        $sqlQuery = "SELECT * FROM area";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve area");
        }
        
        return $statement;
    }
    
    public function getAreaById($AreaID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM area WHERE AreaID = :AreaID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "AreaID" => $AreaID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve area");
        }
        
        return $statement;
    }
    
    public function updateArea($AreaID, $aN, $fL) {
        $sqlQuery =
                "UPDATE property SET " .
                "AreaName = :AreaName, " .
                "Facilities = :Facilities " .
                "WHERE AreaID = :AreaID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "AreaID" => $AreaID,
            "AreaName" => $aN,
            "Facilities" => $fL
        );
        
        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}