<?php

// database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// create a new database connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check for any errors in the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else {
//     echo "<script>alert('Connection');</script>";
// }

?>