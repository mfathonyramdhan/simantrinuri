<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-q0gibfvkdqNBcq8kpjCmR6dd';
Config::$clientKey =  'SB-Mid-client---naeriOUR_gPge9';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;
include '../../../connection.php';
$order_id = $_GET['order_id'];

// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM transaksi t JOIN santri s ON s.id_santri = t.id_santri WHERE id_order='" . $order_id . "'";
$sql = mysqli_query($connection, $query);  // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql);

$query2 = "SELECT * FROM transaksi tr JOIN transaksi_detail td ON tr.id_transaksi_detail = td.id_transaksi_detail WHERE id_order='" . $order_id . "'";
$sql2 = mysqli_query($connection, $query2);  // Eksekusi/Jalankan query dari variabel $query
$data2 = mysqli_fetch_array($sql2);

$query3 = "SELECT * FROM transaksi WHERE id_order='" . $order_id . "'";
$sql3 = mysqli_query($connection, $query3);  // Eksekusi/Jalankan query dari variabel $query
$data3 = mysqli_fetch_array($sql3);

$nama = $data['nama'];
$email = $data['nohp_wali'];

$biaya = $data3['nominal'];

$keterangan = ' SPP ' .  $data['nama'] . ' Sems. ' . $data2['semester'] . ' Tapel. ' . $data2['tahun_pelajaran'];
// Required

$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $biaya // no decimal allowed for creditcard
);
// Optional
$item_details = array(
    array(
        'id' => 'a1',
        'price' => $biaya,
        'quantity' => 1,
        'name' => $keterangan
    )
);
// Optional
$customer_details = array(
    'first_name'    => "$nama",
    'last_name'     => "",
    'phone'         => "$email"

);

// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    echo $e->getMessage();
}


function printExampleWarningMessage()
{
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-q0gibfvkdqNBcq8kpjCmR6dd\';');
        die();
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>SIMANTRINURI</title>

    <link rel="shortcut icon" type="image/png" href="../../../dashboard/images/favicon.png">
    <link href="../../../dashboard/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../../dashboard/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../dashboard/vendor/toastr/css/toastr.min.css">

    <link href="../../../dashboard/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

</head>


<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <h3 class="error-text fw-bold"><i class="fa fa-check text-success"></i></h3>
                        <h5>Transaksi <?php echo $keterangan ?> Berhasil dibuat, Silahkan Selesaikan Transaksi </h5>
                        <div>
                            <button id="pay-button" class="btn btn-primary">PILIH METODE PEMBAYARAN</button>
                        </div>

                        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
                        <script type="text/javascript">
                            document.getElementById('pay-button').onclick = function() {
                                // SnapToken acquired from previous step
                                snap.pay('<?php echo $snap_token ?>');
                            };
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="../../../dashboard/vendor/global/global.min.js"></script>
    <script src="../../../dashboard/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../../../dashboard/js/custom.min.js"></script>
    <script src="../../../dashboard/js/dlabnav-init.js"></script>
    <script src="../../../dashboard/js/demo.js"></script>
    <script src="../../../dashboard/js/styleSwitcher.js"></script>
    <!-- Required vendors -->
    <script src="../../../dashboard/vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- Apex Chart -->
    <script src="../../../dashboard/vendor/apexchart/apexchart.js"></script>

    <!-- Datatable -->
    <script src="../../../dashboard/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../../dashboard/js/plugins-init/datatables.init.js"></script>

    <script src="../../../dashboard/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="../../../dashboard/js/plugins-init/toastr-init.js"></script>
</body>

</html>