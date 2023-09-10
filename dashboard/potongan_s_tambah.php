<?php
$pageTitle = "Tambah Data Potongan Santri";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $id_order = $_POST['id_order'];
    $id_diskon = $_POST['id_diskon'];

    // Insert the new discount into the database
    $insertQuery = "UPDATE transaksi SET id_diskon='$id_diskon' WHERE id_order = '$id_order'";
    if (mysqli_query($connection, $insertQuery)) {
        echo "<script>alert('Data Potongan SPP berhasil ditambahkan.'); window.location='potongan_s.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan potongan.');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Data Potongan Santri</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="potongan_s_tambah.php">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_order">Pilih Transaksi</label>
                                        <select class="form-control selectpicker shadow" id="id_order" name="id_order" data-live-search="true">

                                            <?php // Retrieve student data from the database
                                            $transactionQuery = "SELECT * FROM transaksi t JOIN santri s ON t.nisn_santri = s.nisn WHERE id_diskon = 1";
                                            $queryResult = mysqli_query($connection, $transactionQuery);

                                            while ($transaction = mysqli_fetch_assoc($queryResult)) : ?>
                                                <option value="<?php echo $transaction['id_order']; ?>">
                                                    <?php echo $transaction['nama']; ?> - <?php echo $transaction['id_order']; ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_diskon">Pilih Potongan</label>
                                        <select class="form-control shadow" id="id_diskon" name="id_diskon">

                                            <?php

                                            $transactionQuery5 = "SELECT * FROM diskon";
                                            $queryResult5 = mysqli_query($connection, $transactionQuery5);
                                            while ($diskon = mysqli_fetch_assoc($queryResult5)) : ?>
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

                            <button type="submit" class="btn btn-primary"> Tambah Data Potongan Santri</button>
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