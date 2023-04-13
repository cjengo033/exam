<?php
require 'database.php';
session_start();

$database = new Database();
$conn = $database->getConnection();
class User
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function login($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];
            $username = $row['username'];
            if (password_verify($password, $stored_password)) {
                $_SESSION['username'] = $username;
                header("location: home.php");
            }
        }
    }

    public function register($username, $email, $password)
    {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='container-fluid'>
            <div class='p-3 mb-2 bg-danger text-white text-center'>Username has already been taken</div>
          </div>";
        } else {
            $userRegisterQuery = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($this->conn->query($userRegisterQuery) === TRUE) {
                echo "<div class='container-fluid'>
                <div class='p-3 mb-2 bg-success text-white text-center'>You've been registered!</div>
              </div>";
            }
        }

    }
}

?>