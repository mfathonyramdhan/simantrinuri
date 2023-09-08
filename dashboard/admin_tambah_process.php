<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform the insert operation to add a new teacher
    $query = "INSERT INTO admin (nama, email, password) VALUES ('$name', '$email', '$hashedPassword')";
    $result = mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the teachers page with the toast notification parameters in the URL
    header("Location: admin.php");
    exit();
}
