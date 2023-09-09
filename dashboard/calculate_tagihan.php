<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get selected semester and diskon values from the AJAX request
    $selectedSemester = $_POST["semester"];
    $selectedDiskon = $_POST["diskon"];

    // Include your database connection code here (e.g., include '../connection.php')

    // Fetch the tagihan value for the selected semester from the database
    $query = "SELECT tagihan FROM transaksi_detail WHERE id_transaksi_detail = $selectedSemester";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tagihanForSemester = $row["tagihan"];

        // Fetch the diskon_persentase for the selected diskon from the database
        $query = "SELECT diskon_persentase FROM diskon WHERE diskon_id = $selectedDiskon";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $diskonPersentase = $row["diskon_persentase"];

            // Calculate the tagihan for 1 semester with the selected diskon
            $tagihan1Semester = $tagihanForSemester * $diskonPersentase / 100;

            // Calculate the tagihan for each month with the selected diskon
            $tagihanTiapBulan = $tagihan1Semester / 6;

            // Prepare the response as an associative array
            $response = array(
                "tagihan1Semester" => number_format($tagihan1Semester, 0, ",", "."), // Format the result as currency
                "tagihanTiapBulan" => number_format($tagihanTiapBulan, 0, ",", ".") // Format the result as currency
            );

            // Send the response as JSON
            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            echo "Invalid diskon selection.";
        }
    } else {
        echo "Invalid semester selection.";
    }
} else {
    // Handle the case when the script is accessed directly (not through AJAX)
    echo "Invalid request.";
}
