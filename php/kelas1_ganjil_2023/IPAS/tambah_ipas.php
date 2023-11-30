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

    $query = "SELECT tb_nilai.sumatif, tb_nilai.sumatif_akhir, tb_nilai.nilai_rapor, tb_siswa.nisn, tb_siswa.nama_siswa, tb_siswa.id_kelas, tb_mapel.nama_mapel from tb_nilai join tb_siswa on tb_nilai.nisn = tb_siswa.nisn join tb_mapel on tb_nilai.id_mapel = tb_mapel.id_mapel join tb_tahunajaran on tb_nilai.id_tahunajaran = tb_tahunajaran.id_tahunajaran where id_kelas = 6 AND tb_nilai.id_mapel = 1 AND tb_nilai.id_tahunajaran = 14 AND tb_siswa.nisn = '$nisn';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $sumatif = $result['sumatif'];
    $sumatif_akhir = $result['sumatif_akhir'];
    $rapor =  $result['nilai_rapor'];
    $id_tahunajaran = $result['id_tahunajaran'];
    $id_mapel = $result['id_mapel'];
    // $nama_mapel = $result['nama_mapel'];
}

$sql1 = "SELECT nisn,nama_siswa FROM tb_siswa WHERE id_kelas = 6 AND id_tahunajaran = 14";
$query2 = "SELECT id_mapel, nama_mapel FROM tb_mapel WHERE id_mapel = 1";
$query3 = "SELECT id_tahunajaran, tahun_ajaran FROM tb_tahunajaran where id_tahunajaran = 14"; 
$query4 = "SELECT id_kelas, nama_kelas from tb_kelas WHERE id_kelas = 6";
$sql2 = mysqli_query($conn, $query2);
$sql3 = mysqli_query($conn, $query3);
$sql4 = mysqli_query($conn, $query4);
$result2 = mysqli_fetch_assoc($sql2);
$result3 = mysqli_fetch_assoc($sql3);
$result4 = mysqli_fetch_assoc($sql4);
$id_mapel = $result2['id_mapel'];
$nama_mapel = $result2['nama_mapel'];
$id_tahunajaran = $result3['id_tahunajaran'];
$tahun_ajaran = $result3['tahun_ajaran'];
$id_kelas = $result4['id_kelas'];
$result1 = $conn->query($sql1);

?>

<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Nilai IPAS - Reporthing</title>
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
                                <i class="fa-solid fa-user pe-2"></i>
                                Daftar Siswa
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../rata_rata/indexnilaisiswa.php" class="sidebar-link">
                                <i class="fa-solid fa-book pe-2"></i>
                                Daftar Nilai Siswa
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                                aria-expanded="true">
                                <i class="fa-solid fa-list pe-2"></i>
                                Nilai Sumatif
                            </a>
                            <ul id="pages" class="sidebar-dropdown list-unstyled collapse show"
                                data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="indexsumatif_ipas.php" class="sidebar-link active">
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
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../../../img/1975551339999112004.jpg" class="avatar img-fluid rounded-circle" alt="" />
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#editProfileModal">Profile</a>
                                <a href="logout.php" class="dropdown-item"
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
                                    <img src="../../../img/1975551339999112004.jpg" alt="Profile Picture" class="rounded-circle" width="100"
                                        height="100">
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
                                    <i class="fa fa-pen"></i> Edit Data Nilai IPAS
                                </h6>
                                <!-- <h6 class="card-subtitle" style="color: white;">
                                    Form untuk meng-edit data kelas
                                </h6> -->
                                <?php
                            } else {
                                ?>
                                <h6 name="aksi" value="add" class="card-tittle mt-2" style="color: black;">
                                    <i class="fas fa-plus"></i> Tambah Data Nilai IPAS
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
                                <form method="POST" action="proses_ipas.php" enctype="multipart/form-data" name="autosumForm">
                                    <input type="hidden" value="<?php echo $nisn ?>" name="nisn">
                                    <input type="hidden" value="<?php echo $id_tahunajaran ?>" name="id_tahunajaran">
                                    <input type="hidden" value="<?php echo $id_mapel ?>" name="id_mapel">
                                    <div class="mb-3 row">
                                        <label for="nip" class="col-sm-2 col-form-label">
                                            Nama Siswa
                                        </label>
                                        <div class="col-sm-10">
                                            <select required id="nisn" name="nisn" class="form-select">
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
                                        <label for="notelp" class="col-sm-2 col-form-label">
                                            Sumatif
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="sumatif" class="form-control" id="sumatif" onfocus="startHitungan();" onblur="stopHitungan();"
                                                placeholder="Sumatif">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="sumatif_akhir" class="col-sm-2 col-form-label">
                                            Sumatif Akhir
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="sumatif_akhir" class="form-control" onfocus="startHitungan();" onblur="stopHitungan();"
                                                id="sumatif_akhir" placeholder="Sumatif Akhir">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nilai_rapor" class="col-sm-2 col-form-label">
                                            Nilai Rapor
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="nilai_rapor" class="form-control" id="nilai_rapor"
                                                placeholder="Nilai Rapor" readonly>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="mb-3 row">
                                        <label for="nilai_rapor" class="col-sm-2 col-form-label">
                                            Mata Pelajaran
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="mapel" class="form-control" id="mapel" 
                                                placeholder="" value="<?php echo $id_mapel ?>" readonly>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="mb-3 row">
                                        <label for="nilai_rapor" class="col-sm-2 col-form-label">
                                            Tahun Ajaran
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran"
                                                placeholder="" value="<?php echo $id_tahunajaran ?>" readonly>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="mb-3 row">
                                        <label for="nilai_rapor" class="col-sm-2 col-form-label">
                                            Kelas
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="id_kelas" class="form-control" id="id_kelas"
                                                placeholder="" value="<?php echo $id_kelas ?>" readonly>
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
                                            <a href="indexsumatif_ipas.php" type="button" class="btn btn-danger btn-sm">
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
    <script src="../../../asset/js/script.js"></script>
    <script>
        function checkValue() {
            // Get the numeric input field
            const sumatifInput = document.getElementById('sumatif_akhir');

            // Parse the input value as a float
            const inputValue = parseFloat(sumatifInput.value);

            // Check if the value is greater than 100
            if (inputValue > 100) {
                // Trigger an alert with the updated message
                alert('Nilai Maksimal 100');

                // Optionally, you can reset the input field or take other actions here
                sumatifInput.value = ''; // Reset the input field
            }
        }
        function checkValue() {
            // Get the numeric input field
            const sumatifInput = document.getElementById('sumatif');

            // Parse the input value as a float
            const inputValue = parseFloat(sumatifInput.value);

            // Check if the value is greater than 100
            if (inputValue > 100) {
                // Trigger an alert with the updated message
                alert('Nilai Maksimal 100');

                // Optionally, you can reset the input field or take other actions here
                sumatifInput.value = ''; // Reset the input field
            }
        }
    </script>
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