<?php
include '../../koneksi.php';

$query = "SELECT * FROM tb_guru;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/font-awesome.min.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="style.css">
    <title>Reporthing</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Data Guru</h1>
        <!-- <figure>
        <blockquote class="blockquote">
            <p>Halaman Untuk Mengelola Data Siswa</p>
        </blockquote>
        </figure> -->
        <!-- Button Tambah Data -->
        <a href="kelola.php" type="button" class="btn btn-primary mb-4 mt-3">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>
        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>
                            <center>NIP</center>
                        </th>
                        <th>
                            <center>Nama</center>
                        </th>
                        <th>
                            <center>Tempat & Tgl Lahir</center>
                        </th>
                        <th>
                            <center>No Telp</center>
                        </th>
                        <th>
                            <center>Jenis Kelamin</center>
                        </th>
                        <th>
                            <center>Foto</center>
                        </th>
                        <th>
                            <center>Alamat</center>
                        </th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <!-- Tabel Body -->
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <td>
                                <center>
                                    <?php echo ++$no; ?>.
                                </center>
                            </td>
                            <td>
                                <?php echo $result['nip']; ?>
                            </td>
                            <td>
                                <?php echo $result['nama_guru']; ?>
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
                            <td>
                                <img src="../../img/<?php echo $result['foto_guru']; ?>" style="width: 50px; height: 50px;">
                            </td>
                            <td>
                                <?php echo $result['alamat']; ?>
                            </td>
                            <!-- Button UBAH dan HAPUS-->
                            <td>
                                <center>
                                    <a href="kelola.php?ubah=<?php echo $result['id_guru']; ?>" type="button"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil "></i>
                                    </a>
                                    <a href="proses.php?hapus=<?php echo $result['id_guru']; ?>" type="button"
                                        class="btn btn-danger btn-sm"
                                        onClick="return confirm('Ingin menghapus data tersebut?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                            </td>
                            </center>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- sidebar -->

    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../img/Asset 6xxxhdpi.png" alt="logo">
                </span>
                <span>
                    <div class="text header-text">
                        <span class="name">Reporthing</span>
                    </div>
                </span>
            </div>
            <i class='bx bxs-chevrons-left arrow' ></i>
        </header>
        <hr>
        <div class="menu-bar">
          <div class="menu">
            <ul class="menu link">
              <!-- menu dasboard -->
              <li class="nav-link">
                <!-- <a href="#"> -->
                  <!-- membuat a href untuk menuju file yang dituju -->
                  <a href="#">
                  <i class='bx bx-home-alt icons' ></i>
                  <span class="text nav-text">Dasboard</span>
                </a>
              </li>
              <!-- menu pegawai -->
              <li class="nav-link">
                <a href="../guru/index.php">
                  <i class='bx bx-user-circle icons'></i>
                  <span class="text nav-text">Guru</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="../siswa/index.php">
                  <i class='bx bx-user-pin icons' ></i>
                  <span class="text nav-text">Siswa</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="../kelas/index.php">
                  <i class='bx bxs-devices icons'></i>
                  <span class="text nav-text">Kelas</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="../mata Pelajaran/index.php">
                  <i class='bx bx-book-alt icons'></i>
                  <span class="text nav-text">Mata Pelajaran</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class='bx bx-user icons' ></i>
                  <span class="text nav-text">User</span>
                </a>
              </li>
            </ul>
          </div>


          <div class="bottom-content">
            <li class="admin">
              <!-- <a href="adminn">
                <i class='bx bxs-user'></i>
                <span class="text nav-text">Admin</span>
              </a> -->
            </li>
            <li class="logout">
              <a href="../login/index.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                <i class='bx bx-log-out icons' ></i>  
                <span class="text nav-text">Logout</span>
              </a>
            </li>
          </div>
        </div>

        
    </nav>


</body>

</html>