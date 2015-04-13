<?php

class TenantTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getTenant($sortOrder) {
        // execute a query to get all Tenant
        $sqlQuery = "SELECT * FROM tenants
                     ORDER BY " . $sortOrder;
        
        
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
    
    public function insertTenant($fnT, $lnT, $dob, $gT, $eT, $mnT, $pID, $sl, $du) {
        $sqlQuery = "INSERT INTO tenants " .
                "(FirstName, LastName, DOB, Gender, Email, MobileNum, PropertyID, StartLease, Duration) " .
                "VALUES (:FirstName, :LastName, :DOB, :Gender, :Email, :MobileNum, :PropertyID, :StartLease, :Duration)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "FirstName" => $fnT,
            "LastName" => $lnT,
            "DOB" => $dob,
            "Gender" => $gT,
            "Email" => $eT,
            "MobileNum" => $mnT,
            "PropertyID" => $pID,
            "StartLease" => $sl,
            "Duration" => $du
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
    
    public function updateTenant($TenantID, $fnT, $lnT, $dob, $gT, $eT, $mnT, $pID, $sl, $du) {
        $sqlQuery =
                "UPDATE tenants SET " .
                "FirstName = :FirstName, " .
                "LastName = :LastName, " .
                "DOB = :DOB, " .
                "Gender = :Gender, " .
                "Email = :Email, " .
                "MobileNum = :MobileNum, " .
                "PropertyID = :PropertyID, " .
                "StartLease = :StartLease, " .
                "Duration = :Duration " .
                "WHERE TenantID = :TenantID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "TenantID" => $TenantID,
            "FirstName" => $fnT,
            "LastName" => $lnT,
            "DOB" => $dob,
            "Gender" => $gT,
            "Email" => $eT,
            "MobileNum" => $mnT,
            "PropertyID" => $pID,
            "StartLease" => $sl,
            "Duration" => $du
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}

