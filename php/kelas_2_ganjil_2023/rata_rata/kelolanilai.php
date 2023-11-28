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

    $query = "SELECT tb_siswa.nisn, tb_siswa.nama_siswa, tb_total_nilai.ipas, tb_total_nilai.mtk, tb_total_nilai.bahasa_indonesia, tb_total_nilai.seni_musik, tb_total_nilai.seni_tari, tb_total_nilai.seni_rupa, tb_total_nilai.seni_teater, tb_total_nilai.pjok, tb_total_nilai.bahasa_inggris, tb_total_nilai.rata_rata, tb_total_nilai.id_tahunajaran from tb_total_nilai join tb_siswa on tb_total_nilai.nisn = tb_siswa.nisn join tb_tahunajaran on tb_tahunajaran.id_tahunajaran = tb_total_nilai.id_tahunajaran join tb_kelas on tb_total_nilai.id_kelas = tb_kelas.id_kelas where tb_siswa.id_kelas = 7 AND tb_total_nilai.id_tahunajaran = 14 AND tb_siswa.nisn = '$nisn';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $ipas = $result['ipas'];
    $mtk = $result['mtk'];
    $bahasa_indonesia = $result['bahasa_indonesia'];
    $seni_musik = $result['seni_musik'];
    $seni_tari = $result['seni_tari'];
    $seni_rupa = $result['seni_rupa'];
    $seni_teater = $result['seni_teater'];
    $pjok = $result['pjok'];
    $bahasa_inggris = $result['bahasa_inggris'];
    $rata_rata = $result['rata_rata'];
    $id_tahunajaran = $result['id_tahunajaran'];
}

$sql1 = "SELECT nisn,nama_siswa FROM tb_siswa WHERE id_kelas = 7";
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
                    <a href="#"><img src="../../../img/logo_putih.png" alt="homepage" class="dark-logo"
                            style="width: 10%; margin-right: 2px; margin-bottom: 3px;" /> Reporthing</a>
                </div>
                <ul class="sidebar-nav">
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="../indexdasboard.php" class="sidebar-link">
                                <i class="fa-solid fa-gauge pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../indexdaftarsiswa.php" class="sidebar-link">
                                <i class="fa-solid fa-gauge pe-2"></i>
                                Daftar Siswa
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="indexnilaisiswa.php" class="sidebar-link active">
                                <i class="fa-solid fa-gauge pe-2"></i>
                                Daftar Nilai Siswa
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a href="indexsumatif.php" class="sidebar-link">
                                <i class="fa-solid fa-chalkboard pe-2"></i>
                                Nilai Sumatif
                            </a>
                        </li> -->
                        <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fa-solid fa-list pe-2"></i>
                            Nilai Sumatif
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="../IPAS/indexsumatif_ipas.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>IPAS</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Matematika/indexsumatif_mtk.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Matematika</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Bahasa_Indonesia/indexsumatif_bi.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Bahasa Indonesia</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Seni_Musik/indexsumatif_sm.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Musik</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Seni_Tari/indexsumatif_st.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Tari</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Seni_Rupa/indexsumatif_sr.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Rupa</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Seni_Teater/indexsumatif_st2.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Teater</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../PJOK/indexsumatif_pjok.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>PJOK</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../Bahasa_Inggris/indexsumatif_big.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Bahasa Inggris</a>
                            </li>
                        </ul>
                    </li>
                    </ul>
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
                                <form method="POST" action="prosesnilai.php" enctype="multipart/form-data"
                                    name="autosumForm">
                                    <input type="hidden" value="<?php echo $nisn ?>" name="nisn">
                                    <input type="hidden" value="<?php echo $id_tahunajaran ?>" name="id_tahunajaran">
                                    <input type="hidden" value="<?php echo $id_mapel ?>" name="id_mapel">
                                    <input type="hidden" value="<?php echo $id_kelas ?>" name="id_kelas">
                                    <div class="mb-3 row">
                                        <label for="ipas" class="col-sm-2 col-form-label">
                                            IPAS
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="ipas" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="ipas"
                                                placeholder="Sumatif" value="<?php echo $ipas ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="mtk" class="col-sm-2 col-form-label">
                                            Matematika
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="mtk" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="mtk"
                                                placeholder="Sumatif Akhir" value="<?php echo $mtk ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="bahasa_indonesia" class="col-sm-2 col-form-label">
                                            Bahasa Indonesia
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="bahasa_indonesia" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();"
                                                id="bahasa_indonesia" placeholder="Sumatif Akhir"
                                                value="<?php echo $bahasa_indonesia ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="seni_musik" class="col-sm-2 col-form-label">
                                            Seni Musik
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="seni_musik" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="seni_musik"
                                                placeholder="Sumatif Akhir" value="<?php echo $seni_musik ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="seni_tari" class="col-sm-2 col-form-label">
                                            Seni Tari
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="seni_tari" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="seni_tari"
                                                placeholder="Sumatif Akhir" value="<?php echo $seni_tari ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="seni_rupa" class="col-sm-2 col-form-label">
                                            Seni Rupa
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="seni_rupa" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="seni_rupa"
                                                placeholder="Sumatif Akhir" value="<?php echo $seni_rupa ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="seni_teater" class="col-sm-2 col-form-label">
                                            Seni Teater
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="seni_teater" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="seni_teater"
                                                placeholder="Sumatif Akhir" value="<?php echo $seni_teater ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="pjok" class="col-sm-2 col-form-label">
                                            PJOK
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="pjok" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="pjok"
                                                placeholder="Sumatif Akhir" value="<?php echo $pjok ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="bahasa_inggris" class="col-sm-2 col-form-label">
                                            Bahasa Inggris
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="bahasa_inggris" class="form-control"
                                                onfocus="startHitungan();" onblur="stopHitungan();" id="bahasa_inggris"
                                                placeholder="Sumatif Akhir" value="<?php echo $bahasa_inggris ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="rata_rata" class="col-sm-2 col-form-label">
                                            Rata Rata
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="rata_rata" class="form-control"
                                                id="rata_rata" placeholder="Nilai Rapor"
                                                value="<?php echo $rata_rata ?>" readonly>
                                        </div>
                                    </div>
                            </div>
                            <div class="mb-3 row mt-4">
                                <div class="col">
                                    <?php
                                    if (isset($_GET['ubah'])) {
                                        ?>
                                        <button type="submit" name="aksi" value="edit" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                                            Simpan Perubahan
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="submit" name="aksi" value="add" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                                            Tambahkan
                                        </button>
                                        <?php
                                    }
                                    ?>
                                    <a href="indexnilaisiswa.php" type="button" class="btn btn-danger btn-sm">
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

        window.onload =function(){
            startHitungan();
        };

        function startHitungan() {
            interval = setInterval(calc, 1);;
        } function calc() {
            one = document.autosumForm.ipas.value;
            two = document.autosumForm.mtk.value;
            three = document.autosumForm.bahasa_indonesia.value;
            four = document.autosumForm.seni_musik.value;
            five = document.autosumForm.seni_tari.value;
            six = document.autosumForm.seni_rupa.value;
            seven = document.autosumForm.seni_teater.value;
            eight = document.autosumForm.pjok.value;
            nine = document.autosumForm.bahasa_inggris.value;
            document.autosumForm.rata_rata.value = (one * 1 + two * 1 + three * 1 + four * 1 + five * 1 + six * 1 + seven * 1 + eight * 1 + nine * 1) / (9 * 1);
        } function stopHitungan() {
            clearInterval(interval);
        }
    </script>
</body>

</html>