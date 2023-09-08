<?php
$pageTitle = "Tambah Transaksi";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Retrieve student data from the database
$transactionQuery = "SELECT * FROM santri";
$queryResult = mysqli_query($connection, $transactionQuery);

$transactionQuery4 = "SELECT * FROM transaksi t JOIN santri s ON t.id_santri = s.id_santri";
$queryResult4 = mysqli_query($connection, $transactionQuery4);

$transactionQuery2 = "SELECT COUNT(*) FROM transaksi WHERE status_transaksi != 3";
$queryResult2 = mysqli_query($connection, $transactionQuery2);

$transactionQuery3 = "SELECT * FROM transaksi_detail";
$queryResult3 = mysqli_query($connection, $transactionQuery3);

$transactionQuery5 = "SELECT * FROM diskon";
$queryResult5 = mysqli_query($connection, $transactionQuery5);

// Fetch the result
$row = mysqli_fetch_array($queryResult2);
$countStatusNot3 = $row[0];

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="transaksi_tambah_process.php">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_santri">Pilih Santri</label>
                                        <select class="form-control selectpicker" id="id_santri" name="id_santri" data-live-search="true">
                                            <?php while ($transaction = mysqli_fetch_assoc($queryResult)) : ?>
                                                <option value="<?php echo $transaction['id_santri']; ?>">
                                                    <?php echo $transaction['nama']; ?> - <?php echo $transaction['nisn']; ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>




                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_transaksi_detail">Pilih Semester</label>
                                        <select class="form-control shadow" id="id_transaksi_detail" name="id_transaksi_detail">

                                            <?php while ($tr = mysqli_fetch_assoc($queryResult3)) : ?>
                                                <option value="<?php echo $tr['id_transaksi_detail']; ?>"><?php echo 'Sems. ', $tr['semester'], ' - ', 'Tapel ', $tr['tahun_pelajaran']; ?></option>
                                            <?php endwhile; ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <select class="form-control shadow" id="bulan" name="bulan">
                                            <option value="b1">Januari</option>
                                            <option value="b2">Februari</option>
                                            <option value="b3">Maret</option>
                                            <option value="b4">April</option>
                                            <option value="b5">Mei</option>
                                            <option value="b6">Juni</option>
                                            <option value="b7">Juli</option>
                                            <option value="b8">Agustus</option>
                                            <option value="b9">September</option>
                                            <option value="b10">Oktober</option>
                                            <option value="b11">November</option>
                                            <option value="b12">Desember</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_diskon">Pilih Potongan</label>
                                        <select class="form-control shadow" id="id_diskon" name="id_diskon">

                                            <option value="1" data-percentage="0">Tanpa Potongan</option>
                                            <?php while ($diskon = mysqli_fetch_assoc($queryResult5)) : ?>
                                                <?php if ($diskon['diskon_id'] != 1) : ?>
                                                    <option value="<?php echo $diskon['diskon_id']; ?>" data-percentage="<?php echo $diskon['diskon_persentase']; ?>">
                                                        <?php echo $diskon['diskon_deskripsi'], '- ', 'Potongan Sebesar ', $diskon['diskon_persentase'], '%'; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Tagihan yang harus dibayar 1 Semester :<strong>Rp. 270.000 * 6</strong>
                                    </div>


                                </div>

                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Tagihan yang harus dibayar tiap bulan :<strong>Rp. 270.000</strong>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="nominal" class="form-label">Nominal Cicilan</label>
                                    <input type="number" min="100000" class="form-control" name="nominal" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">✓ Tambah Transaksi Manual</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
include 'template/footer.php';
?>