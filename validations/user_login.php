<?php
session_start();
include('../database/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email_add'];
    $password = $_POST['password'];
   
    // get user by email
    $query = "SELECT * FROM users WHERE email_add='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // direct comparison (plain text password)
        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'];
            $_SESSION['logged_in'] = true;
    
            session_regenerate_id(true);
            if( $_SESSION['user_id'] == 1 ) {
                header("Location: ../dashboard/index.php");
                exit;
            }else{    
                    header("Location: ../index.php");
                    exit;
            }

        } else {
            echo "Wrong password";
        }

    } else {
        echo "User not found";
        echo "<script>alert('User Not Found!'); window.location.href='../register.php';</script>";
        // header("Location: ../register.php");
    }
}
?>