<?php
$pageTitle = "Santri";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Function to delete the student and parents
function deleteStudent($studentId, $connection)
{

    // Delete student
    $deleteStudentQuery = "DELETE FROM santri WHERE id_santri = $studentId";
    mysqli_query($connection, $deleteStudentQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_student'])) {
    $studentId = $_POST['student_id'];

    // Validate student ID
    if (!empty($studentId)) {
        // Delete the student and parents
        deleteStudent($studentId, $connection);
    } else {
        echo "<script>alert('ID Santri Tidak Valid');</script>";
    }
}


?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="siswa_tambah.php" class="btn btn-rounded btn-primary">+ Tambah <?php echo $pageTitle; ?></a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NISN</th>


                                        <th>Kelas</th>
                                        <th>Nama Wali</th>
                                        <th>No HP Wali</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the students table
                                    $query = "SELECT s.*, k.nama AS nama_kelas FROM santri s JOIN kelas k ON k.id_kelas = s.id_kelas";

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
                                                <td><?php echo $row['nisn']; ?></td>

                                                <td><?php

                                                    echo $row['nama_kelas'];

                                                    ?></td>

                                                <td><?php echo $row['nama_wali']; ?></td>
                                                <td><?php echo $row['nohp_wali']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="siswa_update.php?id=<?php echo $row['id_santri']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="student_id" value="<?php echo $row['id_santri']; ?>">
                                                            <button type="submit" name="delete_student" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Apa anda yakin ingin menghapus data santri ini ?');">
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
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                        <th>Nama Wali</th>
                                        <th>No HP Wali</th>

                                        <th>Action</th>
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