<!DOCTYPE html>

<?php
include '../../koneksi.php';

$id_kelas = '';
$nama_kelas = '';
$id_guru = '';

if (isset($_GET['ubah'])) {
    $id_kelas = $_GET['ubah'];

    $query = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_kelas = $result['id_kelas'];
    $nama_kelas = $result['nama_kelas'];
    $id_guru = $result['id_guru'];
}

    $sql1 = "SELECT id_guru, nama_guru FROM tb_guru";
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
            <input type="hidden" value="<?php echo $id_kelas ?>" name="id_kelas">
            <div class="mb-3 row">
                <label for="id_kelas" class="col-sm-2 col-form-label mt-4">
                    Id Kelas
                </label>
                <div class="col-sm-10 mt-4">
                    <input required type="text" name="id_kelas" class="form-control" id="id_kelas" placeholder="Ex: 1A"
                        value="<?php echo $id_kelas; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Kelas
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_kelas" class="form-control" id="nama" placeholder="Ex: 1A"
                        value="<?php echo $nama_kelas; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id_guru" class="col-sm-2 col-form-label">
                    Wali Kelas
                </label>
                <div class="col-sm-10">
                    <select required id="id_guru" name="id_guru" class="form-select">
                        <?php
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                $selected = ($row['id_guru'] == $id_guru) ? "selected" : "";
                                echo "<option $selected value='" . $row["id_guru"] . "'>" . $row["nama_guru"] . "</option>";
                            }
                        } else {
                            echo "0 hasil";
                        }
                        $conn->close();
                        ?>
                    </select>
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