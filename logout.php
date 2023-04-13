<?php
session_start(); // start the session

// log out the user
session_unset();
session_destroy();

header("location: login.php");
?>