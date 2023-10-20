<!DOCTYPE html>
<?php
include '../../koneksi.php';
session_start();

$nip = '';
$nama_guru = '';
$tempat_lahir = '';
$tanggal_lahir = '';
$no_telp = '';
$jenis_kelamin = '';
$alamat = '';

if (isset($_GET['ubah'])) {
    $nip = $_GET['ubah'];

    $query = "SELECT * FROM tb_guru WHERE nip = '$nip';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nip = $result['nip'];
    $nama_guru = $result['nama_guru'];
    $tempat_lahir = $result['tempat_lahir'];
    $tanggal_lahir = $result['tanggal_lahir'];
    $no_telp = $result['no_telp'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];

}
?>

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
                <a href="#"><img src="../../img/logo_putih.png" alt="homepage" class="dark-logo"
                        style="width: 10%; margin-right: 2px; margin-bottom: 3px;"/> Reporthing</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="../../index.html" class="sidebar-link">
                            <i class="fa-solid fa-gauge pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="indexguru.php" class="sidebar-link active">
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
                            <i class="fa-solid fa-chalkboard pe-2"></i>
                            Kelas
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
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
                                <a href="#" class="sidebar-link">Guru</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Siswa</a>
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
                                    <i class="fa fa-pen"></i> Edit Data Guru</h6>
                                <!-- <h6 class="card-subtitle" style="color: white;">
                                    Form untuk meng-edit data kelas
                                </h6> -->
                                <?php
                            } else {
                                ?>
                                <h6 name="aksi" value="add" class="card-tittle mt-2" style="color: black;">
                                    <i class="fas fa-plus"></i> Tambah Data Guru</h6>
                                <!-- <h6 class="card-subtitle text-muted" style="color: white;">
                                    Form untuk menambah data kelas
                                </h6> -->
                                <?php
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form method="POST" action="prosesguru.php" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $nip ?>" name="nip">
                                    <div class="mb-3 row">
                                        <label for="nip" class="col-sm-2 col-form-label">
                                            NIP
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="nip" class="form-control" id="nip"
                                                placeholder="Ex: 112233" value="<?php echo $nip; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">
                                            Nama Guru
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="nama_guru" class="form-control" id="nama"
                                                placeholder="Ex: Naufal" value="<?php echo $nama_guru; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">
                                            Tempat Lahir
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="tempat_lahir" class="form-control"
                                                id="tempat_lahir" placeholder="Ex: Jember"
                                                value="<?php echo $tempat_lahir; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">
                                            Tanggal Lahir
                                        </label>
                                        <div class="col-sm-10">
                                            <input required type="date" name="tanggal_lahir" class="form-control"
                                                id="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
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
                                                } ?>  value="Laki-laki">Laki-laki
                                                </option>
                                                <option <?php if ($jenis_kelamin == 'Perempuan') {
                                                    echo "selected";
                                                } ?>  value="Perempuan">Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="foto" class="col-sm-2 col-form-label">
                                            Foto Guru
                                        </label>
                                        <div class="col-sm-10">
                                            <input <?php if (!isset($_GET['ubah'])) {
                                                echo "require";
                                            } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
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
                                            <a href="indexguru.php" type="button" class="btn btn-danger btn-sm">
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