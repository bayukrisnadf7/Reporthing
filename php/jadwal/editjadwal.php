<!DOCTYPE html>
<?php
include '../../koneksi.php';
session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("Location: ../login/indexlogin.php");
//     exit();
// }

$id_jadwal = '';
$nama_guru = '';
$kelas = '';
$nama_mapel = '';
$hari = '';
$jam_mulai = '';
$jam_selesai = '';

if (isset($_GET['ubah'])) {
    $id_jadwal = $_GET['ubah'];

    $query = "SELECT * FROM tb_jadwal WHERE id_jadwal = '$id_jadwal';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_jadwal = $result['id_jadwal'];
    $nama_guru = $result['nip'];
    $kelas = $result['id_kelas'];
    $nama_mapel = $result['id_mapel'];
    $hari = $result['hari'];
    $jam_mulai = $result['jam_mulai'];
    $jam_selesai = $result['jam_selesai'];

}

$sql1 = "SELECT id_kelas, nama_kelas FROM tb_kelas";
$result1 = $conn->query($sql1);
$sql2 = "SELECT nip, nama_guru FROM tb_guru";
$result2 = $conn->query($sql2);
$sql3 = "SELECT id_mapel, nama_mapel FROM tb_mapel";
$result3 = $conn->query($sql3);
?>

<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Jadwal - Reporthing</title>
    <link href="../../img/logo_putih.png" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" /> -->
    <!-- <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="../../asset/css/style.css" />
</head>

<body>
    <!-- ======== Main wrapper for dashboard =========== -->
    <div class="wrapper">
        <!-- =========== Sidebar for admin dashboard =========== -->
        <aside id="sidebar">
            <!-- ======== Content For Sidebar ========-->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="../../img/logo_putih.png" alt="homepage" class="dark-logo"
                            style="width: 10%; margin-right: 2px; margin-bottom: 3px;" /> Reporthing</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="../../index.php" class="sidebar-link">
                            <i class="fa-solid fa-gauge pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../guru/indexguru.php" class="sidebar-link">
                            <i class="fa-solid fa-user-tie pe-2"></i>
                            Guru
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../siswa/indexsiswa.php" class="sidebar-link">
                            <i class="fa-solid fa-user-graduate pe-2"></i>
                            Siswa
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../kelas/indexkelas.php" class="sidebar-link">
                            <i class="fa-solid fa-chalkboard pe-1"></i>
                            Kelas
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../mapel/indexmapel.php" class="sidebar-link">
                            <i class="fa-solid fa-book pe-2"></i>
                            Mata Pelajaran
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../tahunajaran/indexajaran.php" class="sidebar-link">
                            <i class="fa-solid fa-graduation-cap pe-1"></i>
                            Tahun Ajaran
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="indexjadwal.php" class="sidebar-link active">
                            <i class="fa-solid fa-calendar-days pe-2"></i>
                            Jadwal
                        </a>
                    </li>
                </ul>
                <!-- ======= Navigation links for sidebar ======== -->
                <ul class="sidebar-nav"></ul>
            </div>
        </aside>

        <!-- ========= Main section of dashboard ======= -->
        <div class="main">
            <!-- ========= Main navbar section of dashboard ======= -->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="indexmapel.php" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../../img/profile1.png" class="avatar img-fluid rounded-circle" alt="" />
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#editProfileModal">Profile</a>
                                <a href="../../logout.php" class="dropdown-item"
                                    onClick="return confirm('Anda yakin ingin logout?')">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Modal untuk Profile -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk mengedit profil -->
                            <form action="editprofile.php" method="post">
                                <div class="mb-3 text-center">
                                    <!-- Foto profil dengan border bulat -->
                                    <img src="../../img/profile1.png" alt="Profile Picture" class="rounded-circle"
                                        width="100" height="100">
                                    <!-- Label Admin -->
                                    <h5>
                                        <p class="mt-3">Admin</p>
                                    </h5>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========= Main content section of dashboard ======= -->
            <main class="content px-3 py-2">
                <div class="content-fluid">
                    <!-- <div class="mb-3">
                        <h4>Data Siswa</h4>
                        <h6>Halaman untuk mengelola data siswa</h6>
                    </div> -->
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header" style="background-color: #FFFFFF;">
                            <!-- <h5 class="card-tittle">Data Kelas</h5>
                            <h6 class="card-subtitle text-muted">
                                Halaman untuk mengelola data kelas
                            </h6> -->
                            <?php
                            if (isset($_GET['ubah'])) {
                                ?>
                                <h6 name="aksi" value="edit" class="card-tittle mt-2" style="color: black;">
                                    <i class="fa fa-pen"></i> Edit Data Siswa
                                </h6>
                                <!-- <h6 class="card-subtitle" style="color: white;">
                                    Form untuk meng-edit data kelas
                                </h6> -->
                                <?php
                            } else {
                                ?>
                                <h6 name="aksi" value="add" class="card-tittle mt-2" style="color: black;">
                                    <i class="fas fa-plus"></i> Tambah Data Siswa
                                </h6>
                                <!-- <h6 class="card-subtitle text-muted" style="color: white;">
                                    Form untuk menambah data kelas
                                </h6> -->
                                <?php
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form method="POST" action="prosesjadwal.php" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $id_jadwal ?>" name="id_jadwal">
                                    <div class="mb-3 row">
                                        <label for="hari" class="col-sm-2 col-form-label">
                                            Hari
                                        </label>
                                        <div class="col-sm-10">
                                            <select required id="hari" name="hari" class="form-select">
                                                <option <?php if ($hari == 'Senin') {
                                                    echo "selected";
                                                } ?> value="Senin">Senin
                                                </option>
                                                <option <?php if ($hari == 'Selasa') {
                                                    echo "selected";
                                                } ?> value="Selasa">Selasa
                                                </option>
                                                <option <?php if ($hari == 'Rabu') {
                                                    echo "selected";
                                                } ?> value="Rabu">Rabu
                                                </option>
                                                <option <?php if ($hari == 'Kamis') {
                                                    echo "selected";
                                                } ?> value="Kamis">Kamis
                                                </option>
                                                <option <?php if ($hari == 'Jumat') {
                                                    echo "selected";
                                                } ?> value="Jumat">Jumat
                                                </option>
                                                <option <?php if ($hari == 'Sabtu') {
                                                    echo "selected";
                                                } ?> value="Sabtu">Sabtu
                                                </option>
                                                <option <?php if ($hari == 'Minggu') {
                                                    echo "selected";
                                                } ?> value="Minggu">Minggu
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jam_mulai" class="col-sm-2 col-form-label">
                                            Jam Mulai
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="jam_mulai" class="form-control"
                                                id="jam_mulai" placeholder="Jam Mulai" value="<?php echo $jam_mulai; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jam_selesai" class="col-sm-2 col-form-label">
                                            Jam Selesai
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="jam_selesai" class="form-control"
                                                id="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jam_selesai; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mapel" class="col-sm-2 col-form-label">
                                            Mata Pelajaran
                                        </label>
                                        <div class="col-sm-10">
                                            <select required id="mapel" name="id_mapel" class="form-select">
                                                <?php
                                                if ($result3->num_rows > 0) {
                                                    while ($row = $result3->fetch_assoc()) {
                                                        $selected = ($row['id_mapel'] == $nama_mapel) ? "selected" : "";
                                                        echo "<option $selected value='" . $row["id_mapel"] . "'>" . $row["nama_mapel"] . "</option>";
                                                    }
                                                } else {
                                                    echo "0 hasil";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_guru" class="col-sm-2 col-form-label">
                                            Guru
                                        </label>
                                        <div class="col-sm-10">
                                            <select required id="nama_guru" name="nip" class="form-select">
                                                <?php
                                                if ($result2->num_rows > 0) {
                                                    while ($row = $result2->fetch_assoc()) {
                                                        $selected = ($row['nip'] == $nama_guru) ? "selected" : "";
                                                        echo "<option $selected value='" . $row["nip"] . "'>" . $row["nama_guru"] . "</option>";
                                                    }
                                                } else {
                                                    echo "0 hasil";
                                                }
                                                ?>
                                            </select>
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
                                                        $selected = ($row['id_kelas'] == $kelas) ? "selected" : "";
                                                        echo "<option $selected value='" . $row["id_kelas"] . "'>" . $row["nama_kelas"] . "</option>";
                                                    }
                                                } else {
                                                    echo "0 hasil";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <div class="col">
                                            <?php
                                            if (isset($_GET['ubah'])) {
                                                ?>
                                                <button type="submit" name="aksi" value="edit"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                                                    Simpan Perubahan
                                                </button>
                                                <?php
                                            } else {
                                                ?>
                                                <button type="submit" name="aksi" value="add"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                                                    Tambahkan
                                                </button>
                                                <?php
                                            }
                                            ?>
                                            <a href="indexjadwal.php" type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                                Batal
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- ========= light and dark mode toggle button ======= -->

            <!-- <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a> -->

            <!-- ========= footer section of dashboard ======= -->

            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Reporthing</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../../asset/js/script.js"></script>
</body>

</html>