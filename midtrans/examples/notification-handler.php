<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once('../Midtrans.php');
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-q0gibfvkdqNBcq8kpjCmR6dd';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
}
catch (\Exception $e) {
    exit($e->getMessage());
}

$notif = $notif->getResponse();
$transaction = $notif->transaction_status;
$transaction_id = $notif->transaction_id;

$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

if ($transaction == 'settlement') {
    
 include "koneksi.php";
    $query = "SELECT * FROM transaksi t JOIN santri s ON s.id_santri = t.id_santri WHERE t.id_order='$order_id'";
    $result = mysqli_query($koneksi, $query);

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
        exit();
    }
     

    
} else if ($transaction == 'pending') {
       include "koneksi.php";
   mysqli_query($koneksi,"update transaksi set status_transaksi='1' where id_order='$order_id'");
 
} else if ($transaction == 'deny') {
      include "koneksi.php";
   mysqli_query($koneksi,"update transaksi set status_transaksi='1' where id_order='$order_id'");
 
    
} else if ($transaction == 'expire') {
       include "koneksi.php";
   mysqli_query($koneksi,"update transaksi set status_transaksi='1' where id_order='$order_id'");
 
      
} else if ($transaction == 'cancel') {
     include "koneksi.php";
   mysqli_query($koneksi,"update transaksi set status_transaksi='1' where id_order='$order_id'");
 
}

function printExampleWarningMessage() {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-q0gibfvkdqNBcq8kpjCmR6dd\';');
        die();
    }   
}