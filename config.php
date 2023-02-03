<?php
$servername = "localhost";
$database = "data";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Database Error" . mysqli_connect_error();
}

?>