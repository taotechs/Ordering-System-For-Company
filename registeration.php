<?php
include("connection.php"); // This is where we make a connection

if (isset($_POST['register'])) // This notifies our action initiated through the submit button
{
    // Variable declaration
    $name = $_POST['name'];
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    // Validation
    if ($name == '' || $user_name == '' || $user_email == '' || $user_password == '') {
        echo "<script>alert('Please check for errors')</script>";
        echo "<script>window.open('register.php', '_self')</script>";
        exit();
    }

    // Checking for duplicate registration
    $check_email_query = "SELECT * FROM user WHERE user_email = '$user_email'";
    $run_query = mysqli_query($dbcon, $check_email_query);
    if (mysqli_num_rows($run_query) > 0) {
        echo "<script>alert('Email $user_email is already in the database')</script>";
        exit();
    }

    // Now we insert our values into the database
    $insert_user = "INSERT INTO user (name, user_name, user_email, user_password) VALUES ('$name', '$user_name', '$user_email', '$user_password')";

    if (mysqli_query($dbcon, $insert_user)) {
        echo "<script>window.open('login.php', '_self')</script>";
    }
}
?>
