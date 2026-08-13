<?php
include('../database/connection.php');

$fullname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email =  $_POST['email_add'];
$password =  password_hash($_POST['password'],PASSWORD_BCRYPT);
$agree = $_POST['agree'];

$sql = "INSERT INTO users (first_name, last_name, email_add, password, agree)
        VALUES ('$fullname', '$lastname', '$email', '$password', '$agree')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully!";
    header("Location: ../register.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
