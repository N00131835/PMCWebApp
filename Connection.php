<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "daneel"; //$host = "daneel";
            $database = "n00131835"; //$database = "n00131835";
            $username = "N00131835"; //$username = "N00131835";
            $password = "N00131835"; //$password = "N00131835";
            //details needed to connect to the database.
             
            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connection;
    }
}