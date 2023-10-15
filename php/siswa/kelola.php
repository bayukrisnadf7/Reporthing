<!DOCTYPE html>

<?php
include '../../koneksi.php';

$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$kelas = '';
$tempat_lahir = '';
$tanggal_lahir = '';
$no_telp = '';
$jenis_kelamin = '';
$alamat = '';

if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $kelas = $result['id_kelas'];
    $tempat_lahir = $result['tempat_lahir'];
    $tanggal_lahir = $result['tanggal_lahir'];
    $no_telp = $result['no_telp'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];

}

    $sql1 = "SELECT id_kelas, nama_kelas FROM tb_kelas"; 
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
            <input type="hidden" value="<?php echo $id_siswa ?>" name="id_siswa">

            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label mt-4">
                    NISN
                </label>
                <div class="col-sm-10 mt-4">
                    <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Ex: 112233"
                        value="<?php echo $nisn; ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Siswa
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama"
                        placeholder="Ex: Naufal" value="<?php echo $nama_siswa; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">
                    Kelas
                </label>
                <div class="col-sm-10">
                    <select required id="kelas" name="id_kelas" class="form-select">
                        <?php
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                $selected = ($row['id_kelas'] == $id_kelas) ? "selected" : "";
                                echo "<option $selected value='" . $row["id_kelas"] . "'>" . $row["nama_kelas"] . "</option>";
                            }
                        } else {
                            echo "0 hasil";
                        }

                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">
                    Tempat Lahir
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                        placeholder="Ex: Jember" value="<?php echo $tempat_lahir; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">
                    Tanggal Lahir
                </label>
                <div class="col-sm-10">
                    <input required type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" 
                        value="<?php echo $tanggal_lahir; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notelp" class="col-sm-2 col-form-label">
                    No Telp
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="no_telp" class="form-control" id="notelp" 
                        placeholder="Ex: 085XXXXXXXXX" value="<?php echo $no_telp; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">
                    Jenis Kelamin
                </label>
                <div class="col-sm-10">
                    <select required id="jkel" name="jenis_kelamin" class="form-select">
                        <option <?php if ($jenis_kelamin == 'Laki-laki') {
                            echo "selected";
                        } ?> value="Laki-laki">Laki-laki
                        </option>
                        <option <?php if ($jenis_kelamin == 'Perempuan') {
                            echo "selected";
                        } ?> value="Perempuan">Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">
                    Foto Siswa
                </label>
                <div class="col-sm-10">
                    <input <?php if (!isset($_GET['ubah'])) {
                        echo "require";
                    } ?> class="form-control" type="file"
                        name="foto" id="foto" accept="image/*">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">
                    Alamat Lengkap
                </label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="alamat" name="alamat"
                        rows="3"><?php echo $alamat; ?></textarea>
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