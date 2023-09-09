<?php
$pageTitle = "Tambah Semester";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $pageTitle; ?></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="semester_tambah_process.php" enctype="multipart/form-data">
                    <div class="row">


                        <div class="col">
                            <div class="mb-3 text-center">
                                <label for="semester" class="form-label">Semester</label>
                                <select class="form-select" id="semester" name="semester" placeholder="Pilih Semester">
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="tapel" class="form-label">Tahun Pelajaran</label>
                                <input type="text" class="form-control" id="tapel" name="tapel" placeholder="Masukkan Tahun Pelajaran" value="2023/2024">
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="tagihan" class="form-label"> Tagihan 1 Semester</label>
                                <input type="text" class="form-control" id="tagihan" name="tagihan" placeholder="Masukkan Tagihan selama 1 Semester">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="pdfFile" class="form-label">Upload File Rincian Tagihan PDF</label>
                                <input type="file" class="form-control" id="pdfFile" name="pdfFile" accept=".pdf">
                            </div>
                        </div>







                    </div>





                    <button type="submit" class="btn btn-primary">Tambah Semester</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
include 'template/footer.php';
?>