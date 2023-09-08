<?php


include '../connection.php';

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    $query = "SELECT * FROM transaksi t JOIN santri s ON s.id_santri = t.id_santri WHERE t.id_order='$orderId'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        $token = "!8GR_o@PN1r8FNH+RTub";
        $target = $data['nohp_wali'];
        $nominal = $data['nominal'];
        $status = $data['status_transaksi'];

        if ($status == 1) {
            $statusMessage = "Status Transaksi: Cicilan - Belum Lunas";
        } elseif ($status == 2) {
            $statusMessage = "Status Transaksi: Pending";
        } elseif ($status == 3) {
            $statusMessage = "Status Transaksi: Sudah Lunas";
        } else {
            $statusMessage = "Status Transaksi: Tidak Diketahui";
        }

        $curl = curl_init();

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
                'message' => " *SIMANTRINURI* \n"
                    . " *Pesan Otomatis*\n"
                    . "🎉 *Pembayaran Sukses* 🎉\n\n"
                    . "Detail Pembayaran:\n"
                    . "Nominal: Rp. $nominal\n"
                    . "$statusMessage\n"
                    . "Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami. 📞☎️\n\n"
                    . "Terima kasih atas pembayaran Anda! 💙",
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token" //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        header("Location: transaksi.php");
        exit();
    } else {
        echo "No data found for the specified ID.";
    }
} else {
    echo "No ID parameter provided.";
}
