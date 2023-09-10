
<?php include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $semester = $_POST["semester"];
    $tapel = $_POST["tapel"];
    $tagihan = $_POST["tagihan"];

    // Replace slashes in $tapel with empty strings to get "20232024"
    $tapelc = str_replace(['/', '20'], '', $tapel);

    // Custom filename
    $filename = "frtTapel" . $tapelc . "Sems" . $semester . ".pdf";

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
            // Insert form data into the database
            $query = "INSERT INTO transaksi_detail (semester, tahun_pelajaran, tagihan, file_rincian_tagihan) VALUES ('$semester', '$tapel', '$tagihan', '$filename')";


            $datasantri = "SELECT * FROM santri";
            $rdatasantri = mysqli_query($connection, $datasantri);
            while ($rds = mysqli_fetch_assoc($result)) {
                $ids = $rds['nisn'];

                $id_order = $tapelc . $semester . 'S' . $ids . 'C01';

                $query2 = "INSERT INTO transaksi (id_order, id_diskon, id_santri, tagihan, terbayar) VALUES ('$id_order', 1, '$ids', '$tagihan', 0)";
            }



            if (mysqli_query($connection, $query)) {
                if (mysqli_query($connection, $query2)) {
                    // Data successfully inserted
                    header("Location: semester.php");
                    exit();
                }
            } else {
                // Error inserting data
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
    header("Location: tambah_semester.php");
    exit();
}
