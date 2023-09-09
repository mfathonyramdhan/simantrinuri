<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["id"]; // Add this line to get the ID
    $semester = $_POST["semester"];
    $tapel = $_POST["tapel"];
    $tagihan = $_POST["tagihan"];

    // Replace slashes in $tapel with empty strings to get "20232024"
    $tapel = str_replace('/', '', $tapel);

    // Custom filename
    $filename = "frtTapel" . $tapel . "Sems" . $semester . ".pdf";

    // File upload handling
    $pdfFile = $_FILES["pdfFile"];

    // Check if a file was uploaded
    if ($pdfFile["error"] === UPLOAD_ERR_OK) {
        // Define the directory where you want to save the uploaded PDF
        $uploadDir = "frtpdf/";

        // Define the full path to save the uploaded PDF
        $filePath = $uploadDir . $filename;

        // Move the uploaded PDF to the specified directory
        if (move_uploaded_file($pdfFile["tmp_name"], $filePath)) {
            // Update form data in the database
            $query = "UPDATE transaksi_detail SET semester='$semester', tahun_pelajaran='$tapel', tagihan='$tagihan', file_rincian_tagihan='$filename' WHERE id_transaksi_detail=$id";

            if (mysqli_query($connection, $query)) {
                // Data successfully updated
                header("Location: semester.php");
                exit();
            } else {
                // Error updating data
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            // Error moving uploaded file
            echo "Error uploading PDF.";
        }
    } else {
        // Error uploading file
        echo "Error: " . $pdfFile["error"];
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Redirect to the form page if accessed without POST request
    header("Location: semester.php");
    exit();
}
