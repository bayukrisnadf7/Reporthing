<?php
include '../../koneksi.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login/indexlogin.php");
    exit();
}

$query = "SELECT tb_jadwal.id_jadwal, tb_guru.nama_guru, tb_kelas.nama_kelas, tb_mapel.nama_mapel, tb_jadwal.hari, tb_jadwal.jam_mulai, tb_jadwal.jam_selesai
            FROM tb_jadwal JOIN tb_guru on tb_jadwal.nip = tb_guru.nip
            JOIN tb_kelas on tb_jadwal.id_kelas = tb_kelas.id_kelas
            JOIN tb_mapel on tb_jadwal.id_mapel = tb_mapel.id_mapel;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal - Reporthing</title>
    <link href="../../img/logo_putih.png" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">
    <!-- Data Tables-->
    <link rel="stylesheet" type="text/css" href="../../asset/datatables/datatables.css">
    <script type="text/javascript" src="../../asset/datatables/datatables.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" /> -->
    <!-- <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="../../asset/css/style.css" />
</head>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dt').DataTable();
    });
</script>

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
                    <!-- <li class="sidebar-item">
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
                    </li> -->
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
                                    <img src="../../img/profile1.png" alt="Profile Picture" class="rounded-circle" width="100"
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
                    <div class="mb-3">
                        <h4>Data Jadwal</h4>
                        <h6>Halaman untuk mengelola data jadwal</h6>
                    </div>

                    <!-- Alert Eksekusi-->
                    <?php
                    if (isset($_SESSION['eksekusi'])):
                        if ($_SESSION['eksekusi'] === "Data Berhasil Ditambahkan") {
                            // Tampilkan pesan sukses
                            echo '<div id="alertDiv" class="alert alert-success alert-dismissible fade show" role="alert">';
                            echo $_SESSION['eksekusi'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        } elseif ($_SESSION['eksekusi'] === "Data Berhasil Diperbaharui") {
                            // Tampilkan pesan sukses
                            echo '<div id="alertDiv" class="alert alert-success alert-dismissible fade show" role="alert">';
                            echo $_SESSION['eksekusi'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        } elseif ($_SESSION['eksekusi'] === "Data Berhasil Dihapus") {
                            // Tampilkan pesan sukses
                            echo '<div id="alertDiv" class="alert alert-success alert-dismissible fade show" role="alert">';
                            echo $_SESSION['eksekusi'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        }   else {
                            // Tampilkan pesan kesalahan
                            echo '<div id="alertDiv" class="alert alert-danger alert-dismissible fade show" role="alert">';
                            echo $_SESSION['eksekusi'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        }
                    
                        unset($_SESSION['eksekusi']); // Hapus session setelah menampilkan pesan
                    endif;
                    ?>

                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header" style="background-color: #FFFFFF;">
                            <a href="tambahjadwal.php" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-hover table-striped cell-border">
                                    <thead class="custom-header">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Nama Pelajaran</th>
                                            <th scope="col">Guru</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($result = mysqli_fetch_assoc($sql)) {
                                            ?>
                                            <td>
                                                <?php echo ++$no; ?>.
                                            </td>
                                            <td>
                                                <?php echo $result['hari']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['jam_mulai'] . ' - ' . $result['jam_selesai']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_mapel']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_guru']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_kelas']; ?>
                                            </td>

                                            <!-- Button UBAH dan HAPUS-->
                                            <td>
                                                <a href="editjadwal.php?ubah=<?php echo $result['id_jadwal']; ?>" type="button"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <a href="prosesjadwal.php?hapus=<?php echo $result['id_jadwal']; ?>" type="button"
                                                    class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Ingin menghapus data tersebut?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
    <script src="../../asset/js/script.js"></script>
</body>

</html>