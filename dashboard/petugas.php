<?php
$pageTitle = "Petugas";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the teacher and parents
function deleteteacher($teacherId, $connection)
{

    // Delete teacher
    $deleteteacherQuery = "DELETE FROM petugas WHERE id_petugas = $teacherId";
    mysqli_query($connection, $deleteteacherQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_teacher'])) {
    $teacherId = $_POST['teacher_id'];

    // Validate teacher ID
    if (!empty($teacherId)) {
        // Delete the teacher and parents
        deleteteacher($teacherId, $connection);
    } else {
        echo "<script>alert('ID Petugas Tidak Valid');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="petugas_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Petugas</a>
                    </div> -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the teachers table
                                    $query = "SELECT * FROM petugas";
                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        // Fetch each row and display the data 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="petugas_update.php?id=<?php echo $row['id_petugas']; ?>" class="btn btn-primary shadow sharp me-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form method="post" action="" class="d-none">
                                                            <input type="hidden" name="teacher_id" value="<?php echo $row['id_petugas']; ?>">
                                                            <button type="submit" name="delete_teacher" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Apa anda yakin ingin menghapus petugas ini ? ?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="7">No data found.</td>
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
                                        <th>Nama</th>
                                        <th>Keterangan</th>

                                        <th>Aksi</th>
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