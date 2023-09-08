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

    $updateviolationQuery = "UPDATE transaksi SET status_transaksi='3' WHERE id_transaksi = $violationId";
    mysqli_query($connection, $updateviolationQuery);
}

// Check if the delete button is clicked
if (isset($_POST['update_transaksi'])) {
    $violationId = $_POST['transaksi_id'];

    // Validate violation ID
    if (!empty($violationId)) {
        // Delete the violation and violation
        updatetransaksi($violationId, $connection);
    } else {
        echo "<script>alert('Invalid Transaction ID');</script>";
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
                            <a type="button" href="transaksi_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Transaksi</a> <?php } ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
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
                                    // Retrieve the data from the violation table
                                    $query = "SELECT *
                                              FROM transaksi JOIN santri ON transaksi.id_santri = santri.id_santri";

                                    $query2 = "SELECT k.*, k.nama AS nama_kelas FROM kelas k JOIN santri s ON k.id_kelas = s.id_kelas";

                                    $query3 = "SELECT * FROM transaksi td JOIN transaksi_detail t ON t.id_transaksi_detail = td.id_transaksi_detail";

                                    $result = mysqli_query($connection, $query);

                                    $result2 = mysqli_query($connection, $query2);


                                    $result3 = mysqli_query($connection, $query3);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                while ($row3 = mysqli_fetch_assoc($result3)) {


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
                                                        <td><?php echo $row['nama']; ?></td>
                                                        <td><?php echo $row2['nama_kelas']; ?></td>

                                                        <td><?php echo $row3['semester']; ?></td>

                                                        <td><?php echo $row3['tahun_pelajaran']; ?></td>

                                                        <td><?php echo 'Rp. ' . number_format($row3['nominal'], 0, ',', '.'); ?></td>

                                                        <td><span class="badge <?php echo $badgeClass; ?>"> <?php echo $note; ?></span></td>
                                                        <?php if ($role == 1) { ?>

                                                            <td>
                                                                <div class="d-flex">


                                                                    <form method="post" action="" style="margin-right: 10px;" class="<?php if ($row['status_transaksi'] == 3) {
                                                                                                                                            echo 'd-none';
                                                                                                                                        } ?>">
                                                                        <input type="hidden" name="transaksi_id" value="<?php echo $row['id_transaksi']; ?>">
                                                                        <button type="submit" name="update_transaksi" class="btn btn-success shadow" onclick="return confirm('Anda yakin ingin menandai lunas transaksi ini ?');">
                                                                            <i class="fas fa-money-check-alt"></i> <span> Tandai Lunas</span>
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
                                            }
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="9" class="text-center" style="color: red;">Belum ada data transaksi</td>
                                        </tr>
                                    <?php
                                    }

                                    // Close the database connection
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