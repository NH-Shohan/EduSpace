<?php

// database connection information
$servername = "localhost";

$conn_str = "localhost:1521/ORCL";
$username = "eduspaceMay";
$password = "eduspace23";
$dbname = "login_system";

$conn = oci_connect($username, $password, $conn_str);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    // oci_close($conn);
    echo "Connected with Oracle";
}

?>