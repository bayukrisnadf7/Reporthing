<?php
include '../../koneksi.php';
session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("Location: php/login/indexlogin.php");
//     exit();
// }

$result1 = mysqli_query($conn, "SELECT COUNT(*) as total_siswa FROM tb_siswa where id_kelas = 6");
$row = mysqli_fetch_assoc($result1);
$total_siswa = $row['total_siswa'];

$result2 = mysqli_query($conn, "SELECT nama_guru FROM tb_guru where id_kelas = 6");
$row = mysqli_fetch_assoc($result2);
$nama_guru = $row['nama_guru'];

$result3 = mysqli_query($conn, "SELECT nama_kelas FROM tb_kelas");
$row = mysqli_fetch_assoc($result3);
$nama_kelas = $row['nama_kelas'];

$result4 = mysqli_query($conn, "SELECT * FROM tb_tahunajaran where id_tahunajaran = 14");
$row = mysqli_fetch_assoc($result4);
$semester = $row['semester'];
$tahun_ajaran = $row['tahun_ajaran'];


$query = "SELECT tb_siswa.nisn, tb_siswa.nama_siswa, tb_total_nilai.rata_rata from tb_total_nilai join tb_siswa on tb_total_nilai.nisn = tb_siswa.nisn where tb_total_nilai.id_tahunajaran = 14 and tb_total_nilai.id_kelas = 6 order by rata_rata desc;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Guru - Reporthing</title>
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
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="indexdasboard.php" class="sidebar-link active">
                                <i class="fa-solid fa-gauge pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="indexdaftarsiswa.php" class="sidebar-link">
                                <i class="fa-solid fa-user pe-2"></i>
                                Daftar Siswa
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="rata_rata/indexnilaisiswa.php" class="sidebar-link">
                                <i class="fa-solid fa-book pe-2"></i>
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
                                <a href="IPAS/indexsumatif_ipas.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>IPAS</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Matematika/indexsumatif_mtk.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Matematika</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Bahasa_Indonesia/indexsumatif_bi.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Bahasa Indonesia</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Seni_Musik/indexsumatif_sm.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Musik</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Seni_Tari/indexsumatif_st.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Tari</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Seni_Rupa/indexsumatif_sr.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Rupa</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Seni_Teater/indexsumatif_st2.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>Seni Teater</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="PJOK/indexsumatif_pjok.php" class="sidebar-link">
                                <i class="fa-regular fa-circle pe-2"></i>PJOK</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="Bahasa_Inggris/indexsumatif_big.php" class="sidebar-link">
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
                                <img src="img/profile1.png" class="avatar img-fluid rounded-circle" alt="" />
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="logout.php" class="dropdown-item"
                                    onClick="return confirm('Anda yakin ingin logout?')">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Modal for Change Password -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk mengganti password -->
                            <form action="changepassword.php" method="post">
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword"
                                        name="currentPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <label for="firstName" class="form-label">Guru</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========= Main content section of dashboard ======= -->
            <main class="content px-3 py-2">
                <div class="content-fluid">
                    <div class="mb-3">
                        <h4>Dashboard Guru</h4>
                    </div>
                    <div class="row">
                        <style>
                            .custom-card-blue {
                                position: relative;
                                overflow: hidden;
                                border: none;
                                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                                width: 100%;
                                height: 90px;
                                text-indent: 5px;
                                line-height: 27px;
                                margin-bottom: 10px;
                                background-color: #67729D;
                                /* Blue background */
                                color: #FFFFFF;
                                /* White text color */
                            }
                            
                            .custom-card-green {
                                position: relative;
                                overflow: hidden;
                                border: none;
                                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                                width: 100%;
                                height: 90px;
                                text-indent: 5px;
                                line-height: 27px;
                                margin-bottom: 10px;
                                background-color: #28a745;
                                /* Blue background */
                                color: #FFFFFF;
                                /* White text color */
                            }
                            .custom-card-yellow {
                                position: relative;
                                overflow: hidden;
                                border: none;
                                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                                width: 100%;
                                height: 90px;
                                text-indent: 5px;
                                line-height: 27px;
                                margin-bottom: 10px;
                                background-color: #ffc107;
                                /* Blue background */
                                color: #FFFFFF;
                                /* White text color */
                            }
                            .custom-card-red {
                                position: relative;
                                overflow: hidden;
                                border: none;
                                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                                width: 100%;
                                height: 90px;
                                text-indent: 5px;
                                line-height: 27px;
                                margin-bottom: 10px;
                                background-color: #BE3144;
                                /* Blue background */
                                color: #FFFFFF;
                                /* White text color */
                            }

                            .custom-bg-danger{
                                /* Updated styles for the background color divs */
                                position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                width: 3%;
                                background-color: #BE3144;
                                /* Blue background */
                            }
                            .custom-bg-primary {
                                /* Updated styles for the background color divs */
                                position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                width: 3%;
                                background-color: #67729D;
                                /* Blue background */
                            }
                            .custom-bg-warning {
                                /* Updated styles for the background color divs */
                                position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                width: 3%;
                                background-color: #ffc107;
                                /* Blue background */
                            }
                            .custom-bg-success {
                                /* Updated styles for the background color divs */
                                position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                width: 3%;
                                background-color: #28a745;
                                /* Blue background */
                            }

                            .fa-user-group,
                            .fa-book-open,
                            .fa-users,
                            .fa-house {
                                /* Updated styles for the icons */
                                position: absolute;
                                top: 50%;
                                right: 10px;
                                transform: translateY(-50%);
                                color: #F1F6F9;
                                /* White icon color */
                            }

                            .card-title {
                                font-size: 20px;
                                font-weight: bold;
                            }
                        </style>
                     

<div class="col-12 col-md-6 col-lg-3">
                            <div class="card flex-fill border-0 custom-card-blue">
                                <div class="card-body position-relative">
                                    <i class="fas fa-user fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title"><?php echo $nama_guru ?></p>
                                    <h6 class="card-text" style="color: #0d6efd">Wali Kelas</h6>
                                </div>
                                <div class="custom-bg-primary"></div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card flex-fill border-0 custom-card-green">
                                <div class="card-body">
                                    <i class="fa-solid fa-user-group fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title"><?php echo $total_siswa ?></p>
                                    <h6 class="card-text" style="color: #198754">Jumlah Siswa</h6>
                                </div>
                                <div class="custom-bg-success"></div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card flex-fill border-0 custom-card-yellow">
                                <div class="card-body">
                                <i class="fa-solid fa-users fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title"><?php echo $nama_kelas ?></p>
                                    <h6 class="card-text" style="color: #ffc107">Kelas</h6>
                                </div>
                                <div class="custom-bg-warning"></div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card flex-fill border-0 custom-card-red">
                                <div class="card-body">
                                    <!-- <i class="fa-solid fa-user-graduate fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i> -->
                                    <p class="card-title"><?php echo $tahun_ajaran."\n".$semester ?></p>
                                    <h6 class="card-text" style="color: #dc3545">Tahun Ajaran & Semester</h6>
                                </div>
                                <div class="custom-bg-danger"></div>
                            </div>
                        </div>

                        
                    </div>

                       <!-- Table Element -->
                       <div class="card flex-fill card border-0 mt-2">
                        <div class="card-header mt-2" style="background-color: #FFFFFF;">
                            <h6>Rangking Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-hover">
                                    <thead class="custom-header">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NISN</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Rata Rata</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($result = mysqli_fetch_assoc($sql)) {
                                            ?>
                                            <td>
                                                <?php echo ++$no; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nisn']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_siswa']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['rata_rata']; ?>
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
    <script src="asset/js/script.js"></script>
</body>

</html>