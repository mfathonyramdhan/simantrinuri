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
                <form method="POST" action="semester_tambah_process.php">
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





                    </div>


                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_listrik" class="form-label">1. Biaya Listrik</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_listrik" placeholder="Masukkan Biaya listrik">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_asrama" class="form-label">2. Biaya Asrama</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_asrama" placeholder="Masukkan Biaya Asrama">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_pesantren" class="form-label">3. Biaya Pesantren</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_pesantren" placeholder="Masukkan Biaya Pesantren">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_madin" class="form-label">4. Biaya Madin</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_madin" placeholder="Masukkan Biaya Madin">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_mqqurani" class="form-label">5. Biaya MQ Qur'ani</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_mqqurani" placeholder="Masukkan Biaya MQ Qur'ani">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_mqtahfidz" class="form-label">6. Biaya MQ Tahfidz</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_mqtahfidz" placeholder="Masukkan Biaya MQ Tahfidz">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_mksni" class="form-label">7. Biaya MKS NI</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_mksni" placeholder="Masukkan Biaya MKS NI">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_mqtahsin" class="form-label">8. Biaya MQ Tahsin</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_mqtahsin" placeholder="Masukkan Biaya MQ Tahsin">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_uks" class="form-label">9. Biaya UKS</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_uks" placeholder="Masukkan Biaya UKS">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_lemari" class="form-label">10. Biaya Pemeliharaan Lemari</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_lemari" placeholder="Masukkan Biaya Pemeliharaan Lemari">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_ujianmd" class="form-label">11. Biaya Ujian MD</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_ujianmd" placeholder="Masukkan Biaya Ujian MD">
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="biaya_makan" class="form-label">12. Biaya Makan</label>
                                <input type="text" class="form-control" id="biaya" name="biaya_makan" placeholder="Masukkan Biaya Makan">
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