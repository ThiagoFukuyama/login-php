<?php

namespace Source\Models;

class Dbh 
{

    protected function connect() 
    {
        try {
            
            $dbHostname = DB_CONFIG["host"];
            $dbName = DB_CONFIG["dbname"];
            $dbUsername = DB_CONFIG["username"];
            $dbPassword = DB_CONFIG["password"];

            $dbh = new \PDO("mysql:host={$dbHostname};dbname={$dbName}", $dbUsername, $dbPassword);
            $dbh->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            return $dbh;

        } catch (PDOException $e) {
            
            print "Error: " . $e->getMessage() . "<br>";
            die();

        }
    }

}
