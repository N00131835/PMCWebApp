<?php

class TenantTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getTenant() {
        // execute a query to get all Tenant
        $sqlQuery = "SELECT * FROM tenants";
        
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve Tenant");
        }
        
        return $statement;
    }
    
    public function getTenantById($TenantID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM tenants WHERE TenantID = :TenantID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "TenantID" => $TenantID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve Tenant");
        }
        
        return $statement;
    }
    
    public function insertTenant($a1, $a2, $tn, $ct, $d, $r, $b) {
        $sqlQuery = "INSERT INTO tenants " .
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
            die("Could not insert Tenant");
        }
        
        $TenantID = $this->connection->lastInsertId();
        
        return $TenantID;
    }
    
    public function deleteTenant($TenantID){ //returns true or false if Tenant has been deleted
        $sqlQuery = "DELETE FROM tenants WHERE TenantID = :TenantID"; // the query code that will delete a row, in this case i used the TenantID to be selected.
               
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "TenantID" => $TenantID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete Tenant");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateTenant($TenantID, $a1, $a2, $tn, $ct, $d, $r, $b) {
        $sqlQuery =
                "UPDATE tenants SET " .
                "Address1 = :Address1, " .
                "Address2 = :Address2, " .
                "Town = :Town, " .
                "County = :County, " .
                "Description = :Description, " .
                "Rent = :Rent, " .
                "Bedrooms = :Bedrooms " .
                "WHERE TenantID = :TenantID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "TenantID" => $TenantID,
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

