<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // Perform the insert operation to add a new teacher
    $query = "INSERT INTO kelas (nama) VALUES ('$name')";
    $result = mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the teachers page with the toast notification parameters in the URL
    header("Location: kelas.php");
    exit();
}
