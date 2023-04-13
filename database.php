<?php
class Database
{
    private $conn;

    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'exam';

        // Connect to the database
        $this->conn = mysqli_connect($host, $user, $password, $database);

        // Check for errors
        if (!$this->conn) {
            die('Error connecting to database: ' . mysqli_connect_error());
        } 
    
        
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>




