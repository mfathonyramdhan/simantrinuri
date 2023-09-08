<?php
///usr/local/bin/php /home/n1669549/public_html/simantridaru.website/autosendwa.php 
include 'connection.php';

$query = "SELECT * FROM transaksi t JOIN santri s ON s.id_santri = t.id_santri WHERE status_transaksi != 3";
$result = mysqli_query($connection, $query);

$token = "!8GR_o@PN1r8FNH+RTub";

// Set the locale to Indonesian
setlocale(LC_TIME, 'id_ID');

// Get the current timestamp
$currentTimestamp = date("Y-m-d H:i:s");

// Get the current month name in Indonesian
$bulanini = strftime('%B', strtotime($currentTimestamp));

$curl = curl_init();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $namasiswa = $row['nama'];
        $target = $row['nohp_wali'];

        // Check if $target is less than 12 digits
        if (strlen($target) < 12) {
            continue; // Skip this data and move to the next iteration
        }

        $message = "   *SIMANTRINURI* \n"
            . "   *Pesan Otomatis*\n"
            . "Waktu pesan : $currentTimestamp \n\n"
            . "Assalamu'alaikum, Wali murid $namasiswa \n"
            . "Tagihan bulan $bulanini telah dibuka, silahkan lunasi tagihan.\n\n"
            . "Terimakasih 💙";

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token" // change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        // You can log the response or handle errors here if needed
        if ($response === false) {
            echo 'Error: ' . curl_error($curl);
        }
    }

    curl_close($curl);
} else {
    echo "No data found for the specified condition.";
}
