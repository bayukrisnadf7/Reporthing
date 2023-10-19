<?php
include '../../koneksi.php';

$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;

$sql1 = "SELECT id_kelas, nama_kelas FROM tb_kelas";
$result1 = $conn->query($sql1);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GACOR KANG</title>
    <!-- Bootstrap -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">   
    <title>Reporthing</title>
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
                    <a href="#">Reporthing</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="../../index.html" class="sidebar-link">
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
                        <a href="indexsiswa.php" class="sidebar-link active">
                            <i class="fa-solid fa-user-graduate pe-2"></i>
                            Siswa
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../kelas/indexkelas.php" class="sidebar-link">
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
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fa-solid fa-list pe-2"></i>
                            Pengguna
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="fa-regular fa-circle pe-2"></i> Guru</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
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
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- ========= Main content section of dashboard ======= -->
            <main class="content px-3 py-2">
                <div class="content-fluid">
                    <div class="mb-3">
                        <h4>Data Siswa</h4>
                        <h6>Halaman untuk mengelola data siswa</h6>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <a href="kelolasiswa.php" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">NISN</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Tempat & Tgl Lahir</th>
                                            <th scope="col">No. Telp</th>
                                            <th scope="col">L / P</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Alamat</th>
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
                                                <?php echo $result['nisn']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_siswa']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['id_kelas']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['tempat_lahir'] . ', ' . $result['tanggal_lahir']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['no_telp']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['jenis_kelamin']; ?>
                                            </td>
                                            <td><img src="../../img/<?php echo $result['foto_siswa']; ?>"
                                                    style="width: 50px; height: 50px;"></td>
                                            <td>
                                                <?php echo $result['alamat']; ?>
                                            </td>
                                            <!-- Button UBAH dan HAPUS-->
                                            <td>
                                                <a href="kelolasiswa.php?ubah=<?php echo $result['nisn']; ?>" type="button"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <a href="prosessiswa.php?hapus=<?php echo $result['nisn']; ?>" type="button"
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../asset/js/script.js"></script>
</body>

</html>