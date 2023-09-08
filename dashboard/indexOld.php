<?php
$pageTitle = "PP. Nurul Iman";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';
?>

<div class="row">

    <?php
    // Assuming you have established a database connection


    $query1 = "SELECT COUNT(id_santri) AS total_santri FROM santri";
    $result1 = mysqli_query($connection, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $totalSantri = $row1['total_santri'];

    $query2 = "SELECT COUNT(id_transaksi_detail) AS total_td FROM transaksi_detail";
    $result2 = mysqli_query($connection, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $totalSemester = $row2['total_td'];

    $query3 = "SELECT COUNT(id_transaksi) AS total_transaksi_lunas FROM transaksi WHERE status_transaksi = 3";
    $result3 = mysqli_query($connection, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $totalTransaksiLunas = $row3['total_transaksi_lunas'];

    $query4 = "SELECT COUNT(id_transaksi) AS total_transaksi FROM transaksi";
    $result4 = mysqli_query($connection, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $totalTransaksi = $row4['total_transaksi'];

    $query5 = "SELECT COUNT(id_transaksi) AS total_transaksi_belum_lunas FROM transaksi WHERE status_transaksi = 1";
    $result5 = mysqli_query($connection, $query5);
    $row5 = mysqli_fetch_assoc($result5);
    $totalTransaksiBelumLunas = $row5['total_transaksi_belum_lunas'];

    $totalSiswaBelumBayar  = $totalSantri * $totalSemester - $totalTransaksi;





    // Retrieve the sekolah data
    $query = "SELECT * FROM santri";
    $result = mysqli_query($connection, $query);

    // Check if any rows are found
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>




    <!-- task, page, download counter  start -->

    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-lite-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white"><?= $totalSantri ?></h4>
                        <h6 class="text-white m-b-0">Total Siswa</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1"
                            style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <canvas id="update-chart-4" height="50" width="45"
                            style="display: block; width: 45px; height: 50px;"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white"><?= $totalSiswaBelumBayar ?></h4>
                        <h6 class="text-white m-b-0">Santri Belum Bayar</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1"
                            style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <canvas id="update-chart-3" height="50" width="45"
                            style="display: block; width: 45px; height: 50px;"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white"><?= $totalTransaksiBelumLunas ?></h4>
                        <h6 class="text-white m-b-0">Transaksi Cicilan</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1"
                            style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <canvas id="update-chart-1" height="50" width="45"
                            style="display: block; width: 45px; height: 50px;"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white"><?= $totalTransaksiLunas ?></h4>
                        <h6 class="text-white m-b-0">Transaksi Lunas</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1"
                            style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <canvas id="update-chart-2" height="50" width="45"
                            style="display: block; width: 45px; height: 50px;"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- task, page, download counter  end -->

    <!--  sale analytics start -->
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Sales Analytics</h5>
                <span class="text-muted">For more details about usage, please refer <a
                        href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <table id="santriTable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Santri</th>
                            <th>Nama Santri</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Assuming you have established a database connection

                            $query = "SELECT * FROM santri";
                            $result = mysqli_query($connection, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $counter = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $counter++ . '</td>';
                                    echo '<td>' . $row['id_santri'] . '</td>';
                                    echo '<td>' . $row['nama'] . '</td>';
                                    echo '<td>' . $row['id_kelas'] . '</td>';
                                    echo '<td>' . $row['nama_wali'] . '</td>';
                                    echo '<td>' . $row['nohp_wali'] . '</td>';
                                    echo '</tr>';
                                }
                            }
                            mysqli_close($connection);
                            ?> </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-12">
        <div class="card user-card2">
            <div class="card-block text-center">
                <h6 class="m-b-15">Grafik Lingkaran</h6>
                <canvas id="donutChart"></canvas>
            </div>
        </div>
    </div>
    <script>
    // Initialize DataTables
    $(document).ready(function() {
        $('#santriTable').DataTable();
    });
    </script>
    <script>
    var ctx = document.getElementById('donutChart').getContext('2d');
    var donutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Transaksi Dalam Cicilan', 'Total Transaksi Lunas', 'Total Santri Belum Bayar'],
            datasets: [{
                data: [<?php echo $totalTransaksiBelumLunas; ?>, <?php echo $totalTransaksiLunas; ?>,
                    <?php echo $totalSiswaBelumBayar; ?>
                ],
                backgroundColor: ['#fe9365', '#0ac282', '#eb3422'],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            cutoutPercentage: 60, // Adjust to create a donut chart
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    });
    </script>




















    <?php
    } else {
    }

    // Close the database connection
    mysqli_close($connection);
    ?>
</div>

<?php
include 'template/footer.php';
?>