<!DOCTYPE html>

<?php
include '../../koneksi.php';

$id_mapel = '';
$nama_mapel = '';
$kkm = '';

if (isset($_GET['ubah'])) {
    $id_mapel = $_GET['ubah'];

    $query = "SELECT * FROM tb_mapel WHERE id_mapel = '$id_mapel';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_mapel = $result['id_mapel'];
    $nama_mapel = $result['nama_mapel'];
    $kkm = $result['kkm'];
}

    $sql1 = "SELECT * FROM tb_mapel";
    $result1 = $conn->query($sql1);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Bootstrap -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/font-awesome.min.css">

    <title>Reporthing</title>

</head>

<body>
    <div class="container mt-4">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_mapel ?>" name="id_mapel">
            <div class="mb-3 row">
                <label for="id_kelas" class="col-sm-2 col-form-label mt-4">
                    ID Mapel
                </label>
                <div class="col-sm-10 mt-4">
                    <input required type="text" name="id_mapel" class="form-control" id="id_mapel" placeholder="Ex: BI1"
                        value="<?php echo $id_mapel; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Mapel
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_mapel" class="form-control" id="nama_mapel" placeholder="Ex: Bahasa Indonesia"
                        value="<?php echo $nama_mapel; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    KKM
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="kkm" class="form-control" id="kkm" placeholder="Ex: 70"
                        value="<?php echo $kkm; ?>">
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                    if (isset($_GET['ubah'])) {
                        ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                        <?php
                    } else {
                        ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Tambahkan
                        </button>
                        <?php
                    }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>