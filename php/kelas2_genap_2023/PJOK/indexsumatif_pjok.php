<?php
include '../../../koneksi.php';
session_start();

$query = "SELECT tb_nilai.sumatif, tb_nilai.sumatif_akhir, tb_nilai.nilai_rapor, tb_siswa.nisn, tb_siswa.nama_siswa, tb_siswa.id_kelas, tb_mapel.nama_mapel from tb_nilai join tb_siswa on tb_nilai.nisn = tb_siswa.nisn join tb_mapel on tb_nilai.id_mapel = tb_mapel.id_mapel join tb_tahunajaran on tb_nilai.id_tahunajaran = tb_tahunajaran.id_tahunajaran where tb_siswa.id_kelas = 7 AND tb_nilai.id_mapel = 8 AND tb_nilai.id_tahunajaran = 15";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PJOK - Reporthing</title>
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
                            <a href="../rata_rata/indexnilaisiswa.php" class="sidebar-link">
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
                                aria-expanded="true">
                                <i class="fa-solid fa-list pe-2"></i>
                                Nilai Sumatif
                            </a>
                            <ul id="pages" class="sidebar-dropdown list-unstyled collapse show"
                                data-bs-parent="#sidebar">
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
                                    <a href="indexsumatif_pjok.php" class="sidebar-link active">
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
                                <img src="../../img/profile1.png" class="avatar img-fluid rounded-circle" alt="" />
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="../login/indexlogin.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- ========= Main content section of dashboard ======= -->
            <main class="content px-3 py-2">
                <div class="content-fluid">
                    <div class="mb-3">
                        <h4>Mata Pelajaran Pendidikan Jasmani, Olahraga dan Kesehatan</h4>
                        <h6>Halaman untuk mengelola nilai sumatif</h6>
                    </div>

                    <?php
                    if (isset($_SESSION['eksekusi'])):
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php
                            echo $_SESSION['eksekusi'];
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        session_destroy();
                    endif;
                    ?>
                </div>

                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-header" style="background-color: #FFFFFF;">
                        <a href="tambah_pjok.php" type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dt" class="table table-hover">
                                <thead class="custom-header">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Sumatif</th>
                                        <th scope="col">Sumatif Akhir Semester</th>
                                        <th scope="col">Nilai Rapor</th>
                                        <!-- <th scope="col">Tahun Ajaran</th> -->
                                        <th scope="col">Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($result = mysqli_fetch_assoc($sql)) {

                                        // Hitung jumlah siswa per kelas
                                        // $kelas_id = $result['id_kelas'];
                                        ?>

                                        <td>
                                            <?php echo ++$no; ?>.
                                        </td>
                                        <td>
                                            <?php echo $result['nisn']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result['nama_siswa']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result['sumatif']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result['sumatif_akhir']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result['nilai_rapor']; ?>
                                        </td>

                                        <td>
                                            <a href="edit_pjok.php?ubah=<?php
                                            echo $result['nisn'];
                                            ?>" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <!-- <a href="proses_pjok.php?hapus=<?php
                                            echo $result['nisn'];
                                            ?>" type="button" class="btn btn-danger btn-sm"
                                                onClick="return confirm('Ingin menghapus data tersebut?')">
                                                <i class="fa fa-trash"></i>
                                            </a> -->
                                        </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>




    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../../asset/js/script.js"></script>
</body>

</html>