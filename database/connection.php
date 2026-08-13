<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clothsy";

$conn = mysqli_connect($servername, $username, $password, $dbname );

if (!$conn) {
    die('Connection is failed:' . mysqli_connect_error());
}
// echo "Connected successfully";
