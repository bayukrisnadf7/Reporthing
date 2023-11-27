<!DOCTYPE html>
<?php
include '../../../koneksi.php';
session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("Location: ../login/indexlogin.php");
//     exit();
// }

$nisn = '';
$nama_siswa = '';

if (isset($_GET['ubah'])) {
    $nisn = $_GET['ubah'];

    $query = "SELECT tb_nilai.sumatif, tb_nilai.sumatif_akhir, tb_nilai.nilai_rapor, tb_siswa.nisn, tb_siswa.nama_siswa, tb_siswa.id_kelas, tb_mapel.nama_mapel from tb_nilai join tb_siswa on tb_nilai.nisn = tb_siswa.nisn join tb_mapel on tb_nilai.id_mapel = tb_mapel.id_mapel join tb_tahunajaran on tb_nilai.id_tahunajaran = tb_tahunajaran.id_tahunajaran where tb_nilai.id_kelas = 6 AND tb_nilai.id_mapel = 4 AND tb_nilai.id_tahunajaran = 14 AND tb_siswa.nisn = '$nisn';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $sumatif = $result['sumatif'];
    $sumatif_akhir = $result['sumatif_akhir'];
    $rapor = $result['nilai_rapor'];
}

$sql1 = "SELECT nisn,nama_siswa FROM tb_siswa WHERE id_kelas = 6";
$result1 = $conn->query($sql1);
?>

<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Kelas - Reporthing</title>
    <link href="../../../img/logo_putih.png" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="../../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../asset/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../asset/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" /> -->
    <!-- <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="../../../asset/css/style.css" />
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
                        <a href="indexkelas.php" class="sidebar-link active">
                            <i class="fa-solid fa-chalkboard pe-2"></i>
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
                            <i class="fa-solid fa-calendar-days pe-2"></i>
                            Tahun Ajaran
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fa-solid fa-list pe-2"></i>
                            Pengguna
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="../pengguna/guru/indexpenggunaguru.php" class="sidebar-link">
                                    <i class="fa-regular fa-circle pe-2"></i> Guru</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../pengguna/siswa/indexpenggunasiswa.php" class="sidebar-link">
                                    <i class="fa-regular fa-circle pe-2"></i> Siswa</a>
                            </li>
                        </ul>
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
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">Admin</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========= Main content section of dashboard ======= -->
            <main class="content px-3 py-2">
                <div class="content-fluid">
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
                                    <i class="fa fa-pen"></i> Edit Data Kelas
                                </h6>
                                <!-- <h6 class="card-subtitle" style="color: white;">
                                    Form untuk meng-edit data kelas
                                </h6> -->
                                <?php
                            } else {
                                ?>
                                <h6 name="aksi" value="add" class="card-tittle mt-2" style="color: black;">
                                    <i class="fas fa-plus"></i> Tambah Data Kelas
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
                                <form method="POST" action="proses_sm.php" enctype="multipart/form-data" name="autosumForm">
                                    <input type="hidden" value="<?php echo $nisn ?>" name="nisn">
                                    <input type="hidden" value="<?php echo $id_tahunajaran ?>" name="id_tahunajaran">
                                    <input type="hidden" value="<?php echo $id_mapel ?>" name="id_mapel">
                                    <div class="mb-3 row">
                                        <label for="nip" class="col-sm-2 col-form-label">
                                            Nama Siswa
                                        </label>
                                        <div class="col-sm-10">
                                            <select required id="nip" name="nip" class="form-select">
                                                <?php
                                                if ($result1->num_rows > 0) {
                                                    while ($row = $result1->fetch_assoc()) {
                                                        $selected = ($row['nisn'] == $nisn) ? "selected" : "";
                                                        echo "<option $selected value='" . $row["nisn"] . "'>" . $row["nama_siswa"] . "</option>";
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
                                            <label for="sumatif" class="col-sm-2 col-form-label">
                                                Sumatif
                                            </label>
                                            <div class="col-sm-10">
                                                <input required type="text" name="sumatif" class="form-control" onfocus="startHitungan();" onblur="stopHitungan();"
                                                    id="sumatif" placeholder="Sumatif" value="<?php echo $sumatif?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="sumatif_akhir" class="col-sm-2 col-form-label">
                                                Sumatif Akhir
                                            </label>
                                            <div class="col-sm-10">
                                                <input required type="text" name="sumatif_akhir" class="form-control" onfocus="startHitungan();" onblur="stopHitungan();"
                                                    id="sumatif_akhir" placeholder="Sumatif Akhir" value="<?php echo $sumatif_akhir?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nilai_rapor" class="col-sm-2 col-form-label">
                                                Rapor
                                            </label>
                                            <div class="col-sm-10">
                                                <input required type="text" name="nilai_rapor" class="form-control"
                                                    id="nilai_rapor" placeholder="Nilai Rapor"
                                                    value="<?php echo $rapor ?>">
                                            </div>
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
                                            <a href="indexsumatif_sm.php" type="button" class="btn btn-danger btn-sm">
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
    <script>
        function startHitungan(){
            interval =setInterval("calc()",1);;
        } function calc(){
            one = document.autosumForm.sumatif.value;
            two = document.autosumForm.sumatif_akhir.value;
            document.autosumForm.nilai_rapor.value = (one * 1 + two * 1) / (2 * 1) ;
        }function stopHitungan(){
            clearInterval(interval);
        }
    </script>
</body>

</html>