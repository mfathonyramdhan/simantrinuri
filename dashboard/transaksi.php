<?php
$pageTitle = "Transaksi";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Function to delete the violation and violation
function deleteviolation($violationId, $connection)
{
    // Delete violation
    $deleteviolationQuery = "DELETE FROM transaksi WHERE id_transaksi = $violationId";
    mysqli_query($connection, $deleteviolationQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_transaksi'])) {
    $violationId = $_POST['transaksi_id'];

    // Validate violation ID
    if (!empty($violationId)) {
        // Delete the violation and violation
        deleteviolation($violationId, $connection);
    } else {
        echo "<script>alert('Invalid Transaction ID');</script>";
    }
}

// Function to delete the violation and violation
function updatetransaksi($violationId, $connection)
{
    $query = "SELECT id_transaksi_detail FROM transaksi WHERE id_transaksi = $violationId";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_transaksi_detail = $row['id_transaksi_detail'];

        $biayaColumns = ['biaya_listrik', 'biaya_asrama', 'biaya_pesantren', 'biaya_madin', 'biaya_mqqurani', 'biaya_mqtahfidz', 'biaya_mksni', 'biaya_mqtahsin', 'biaya_uks', 'biaya_lemari', 'biaya_ujianmd', 'biaya_makan'];

        $totalAmount = 0;
        foreach ($biayaColumns as $column) {
            $biayaQuery = "SELECT $column FROM transaksi_detail WHERE id_transaksi_detail = '$id_transaksi_detail'";
            $biayaResult = mysqli_query($connection, $biayaQuery);

            if ($biayaResult) {
                $biayaRow = mysqli_fetch_assoc($biayaResult);
                $totalAmount += $biayaRow[$column];
            }
        }

        $updateviolationQuery = "UPDATE transaksi SET status_transaksi='3', nominal='$totalAmount' WHERE id_transaksi = $violationId";
        mysqli_query($connection, $updateviolationQuery);
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                        <?php if ($role == 1) { ?>
                            <a type="button" href="transaksi_tambah.php" class="btn btn-rounded btn-primary">+ Transaksi Manual</a>

                            <a type="button" href="transaksi_tambah_transfer.php" class="btn btn-rounded btn-primary">+ Transaksi Transfer</a>

                        <?php } ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Santri</th>
                                        <th>Kelas</th>
                                        <th>Sems.</th>
                                        <th>Tapel</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <?php if ($role == 1) { ?>

                                            <th>Aksi</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT t.*, s.nama AS nama_santri, k.nama AS nama_kelas, td.semester AS semester, td.tahun_pelajaran AS tahun_pelajaran
                                    FROM transaksi t
                                    JOIN santri s ON t.id_santri = s.id_santri
                                    JOIN kelas k ON s.id_kelas = k.id_kelas
                                    JOIN transaksi_detail td ON t.id_transaksi_detail = td.id_transaksi_detail";

                                    $result = mysqli_query($connection, $query);

                                    if (!$result) {
                                        var_dump('Query Error: ' . mysqli_error($connection));
                                    }
                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $badgeClass = '';
                                            $note = '';

                                            if ($row['status_transaksi'] == 1) {
                                                $badgeClass = 'badge-danger';
                                                $note = 'Belum Lunas';
                                            } elseif ($row['status_transaksi'] == 2) {
                                                $badgeClass = 'badge-danger';
                                                $note = 'Pembayaran Pending';
                                            } elseif ($row['status_transaksi'] == 3) {
                                                $badgeClass = 'badge-success';
                                                $note = 'Lunas';
                                            } else {
                                                $badgeClass = 'badge-danger';
                                                $note = 'Error';
                                            }
                                    ?>

                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $row['id_order']; ?></td>
                                                <td><?php echo $row['nama_santri']; ?></td>
                                                <td><?php echo $row['nama_kelas']; ?></td>
                                                <td><?php echo $row['semester']; ?></td>
                                                <td><?php echo $row['tahun_pelajaran']; ?></td>
                                                <td><?php echo 'Rp. ' . number_format($row['nominal'], 0, ',', '.'); ?></td>
                                                <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $note; ?></span>
                                                </td>
                                                <?php if ($role == 1) { ?>

                                                    <td>
                                                        <div class="d-flex">


                                                            <form method="post" action="transaksi_update_process.php?id=<?php echo $row['id_transaksi']; ?>" style="margin-right: 10px;">
                                                                <input type="hidden" name="transaksi_id" value="<?php echo $row['id_transaksi']; ?>">
                                                                <button type="submit" name="update_transaksi" class="btn btn-success shadow" onclick="return confirm('Anda yakin ingin menandai lunas transaksi ini ?');">
                                                                    <i class="fas fa-money-check-alt"></i> <span> Tandai
                                                                        Lunas</span>
                                                                </button>
                                                            </form>

                                                            <!-- ... -->
                                                            <form method="post" action="" style="margin-right: 10px;" class="<?php if ($row['status_transaksi'] != 3) {
                                                                                                                                    echo 'd-none';
                                                                                                                                } ?>">
                                                                <input type="hidden" name="transaksi_id" value="<?php echo $row['id_transaksi']; ?>">
                                                                <a href="transaksi_print.php?transaksi_id=<?php echo $row['id_transaksi']; ?>" class="btn btn-primary shadow">
                                                                    <i class="fa fa-print"></i> <span> Print</span>
                                                                </a>
                                                            </form>
                                                            <!-- ... -->
<!--
                                                            <form method="post" action="" style="margin-right: 10px;" class="<?php if ($row['status_transaksi'] == 3) {
                                                                                                                                    echo 'd-none';
                                                                                                                                } ?>">
                                                                <input type="hidden" name="transaksi_id" value="<?php echo $row['id_transaksi']; ?>">
                                                                <a href="transaksi_print.php?transaksi_id=<?php echo $row['id_transaksi']; ?>" class="btn btn-primary shadow">
                                                                    <i class="fa fa-print"></i> <span> Edit</span>
                                                                </a>
                                                            </form>
-->

                                                            <form method="post" action="">
                                                                <input type="hidden" name="transaksi_id" value="<?php echo $row['id_transaksi']; ?>">
                                                                <button type="submit" name="delete_transaksi" class="btn btn-danger shadow" onclick="return confirm('Are you sure you want to delete this transaction ?');">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>


                                                        </div>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="9" class="text-center" style="color: red;">Belum ada data transaksi
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    mysqli_close($connection);
                                    ?>



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Santri</th>
                                        <th>Kelas</th>
                                        <th>Sems.</th>
                                        <th>Tapel</th>
                                        <th>Nominal</th>
                                        <th>Status</th> <?php if ($role == 1) { ?>

                                            <th>Aksi</th> <?php } ?>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'template/footer.php';
?>