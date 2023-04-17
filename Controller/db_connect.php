<?php

// database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// For Oracle
// $servername2 = "oci:dbname=//localhost:8080/orcl;charset=UTF8";
// $username2 = "system";
// $password2 = "jjS12345";
// $dbname2 = "login_system";

// $conn2 = oci_connect($username, $password, $conn_str);

// if (!$conn2) {
//     $e = oci_error();
//     trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
// } else {
//     echo "bolod";
// }
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