<?php

class DB {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'octagon';

    public function connect () {

        try {
            $conn = new PDO("sqlite:D:\projects\octagon\db\octagon");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die ($e->getMessage());
        }
        
        return $conn;
    }
}