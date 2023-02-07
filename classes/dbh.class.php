<?php

class Dbh {

    protected function connect() {
        try {
            
            $dbUsername = "root";
            $dbPassword = "usbw";
            $dbHostname = "localhost:3306";
            $dbName = "login_php_oop";

            $dbh = new PDO("mysql:host={$dbHostname};dbname={$dbName}", $dbUsername, $dbPassword);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;

        } catch (PDOException $e) {
            
            print "Error: " . $e->getMessage() . "<br>";
            die();

        }
    }

}
