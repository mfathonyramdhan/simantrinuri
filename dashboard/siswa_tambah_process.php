<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $nisn = $_POST['nisn'];

    $idClass = $_POST['id_kelas'];
    $namawali = $_POST['namawali'];
    $nohpwali = $_POST['nohpwali'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);




    // Hash the password

    // Perform the insert operation to add a new student
    $query = "INSERT INTO santri (nama, nisn, id_kelas, nama_wali, nohp_wali, email, password) VALUES ('$name', '$nisn',  '$idClass', '$namawali', '$nohpwali','$email', '$hashedPassword' )";
    $result = mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the students page with the toast notification parameters in the URL
    header("Location: siswa.php");
    exit();
}
